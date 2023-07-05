<?php

namespace App\Filament\Resources\BusinessResource\RelationManagers;

use Filament\Forms;
use App\Models\Menu;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class MenuVariationRelationManager extends RelationManager
{
    protected static string $relationship = 'menuVariation';

    protected static ?string $recordTitleAttribute = 'business_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('menu_variation_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('selling_price')
                    ->required()
                    ->numeric(),
                Select::make('category')
                    ->relationship('menu', 'menu_name')
                    ->options(function (RelationManager $livewire) {
                        return Menu::where('business_id', $livewire->ownerRecord->id)
                            ->pluck('menu_name', 'id');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menu.menu_name'),
                Tables\Columns\TextColumn::make('variationCategory.name')->label('Variant Category'),
                Tables\Columns\ToggleColumn::make('variationCategory.is_required')->label('Required Category'),
                Tables\Columns\TextColumn::make('menu_variation_name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('selling_price'),
            ])
            ->filters([
                Filter::make('Menu Name')
                    ->form([
                        Forms\Components\TextInput::make('menu_name'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['menu_name'],
                                function (Builder $query, $menu_name): Builder {
                                    return $query->whereHas('menu', function ($q) use ($menu_name) {
                                        $q->where('menu_name', 'like', "%{$menu_name}%");
                                    });
                                },
                            );
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
