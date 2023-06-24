<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Menu;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MenuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MenuResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationGroup = 'Manage Menu';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('business.business_name')->sortable(),
                TextColumn::make('menu_name')->sortable(),
                TextColumn::make('price')->sortable(),
                TextColumn::make('selling_price')->sortable(),
                ToggleColumn::make('is_published'),
            ])
            ->filters([
                Filter::make('business_name')
                    ->form([
                        TextInput::make('business_name')
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['business_name'],
                                fn (Builder $query, $data): Builder => $query->whereHas(
                                    'business',
                                    function ($q) use ($data) {
                                        $q->where('business_name', 'like', "%$data%");
                                    }
                                ),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMenus::route('/'),
        ];
    }
}
