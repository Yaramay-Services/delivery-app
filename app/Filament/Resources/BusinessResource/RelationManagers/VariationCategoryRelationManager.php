<?php

namespace App\Filament\Resources\BusinessResource\RelationManagers;

use App\Models\VariationCategory;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariationCategoryRelationManager extends RelationManager
{
    protected static string $relationship = 'variationCategory';

    protected static ?string $recordTitleAttribute = 'VariationCategory';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('display_order')
                    ->numeric()
                    ->required(),
                Forms\Components\Toggle::make('is_required')
                    ->required(),
                Forms\Components\Select::make('parent_id')
                    ->relationship('variationCategory', 'id')
                    ->options(function (RelationManager $livewire) {
                        return VariationCategory::where('business_id', $livewire->ownerRecord->id)
                            ->pluck('name', 'id');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('menu.menu_name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('variationCategory.name'),
                ToggleColumn::make('is_required'),
            ])
            ->filters([
                //
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
