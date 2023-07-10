<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\VariationCategory;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VariationCategoryResource\Pages;
use App\Filament\Resources\VariationCategoryResource\RelationManagers;

class VariationCategoryResource extends Resource
{
    protected static ?string $model = VariationCategory::class;
    protected static ?string $navigationGroup = 'Manage Business';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('business.business_name')
            ])
            ->filters([
                SelectFilter::make('business_name')
                    ->relationship('business', 'business_name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVariationCategories::route('/'),
            'create' => Pages\CreateVariationCategory::route('/create'),
            'edit' => Pages\EditVariationCategory::route('/{record}/edit'),
        ];
    }
}
