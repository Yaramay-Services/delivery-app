<?php

namespace App\Filament\Resources\BusinessResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\MenuCategory;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class MenuRelationManager extends RelationManager
{
    protected static string $relationship = 'Menu';

    protected static ?string $recordTitleAttribute = 'day';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('menu_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('selling_price')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('display_order')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('menu_category_id')
                    ->multiple()
                    ->relationship('category', 'category_id')
                    ->options(function (RelationManager $livewire) {
                        return MenuCategory::where('business_id', $livewire->ownerRecord->id)
                            ->pluck('category_name', 'id');
                    }),
                SpatieMediaLibraryFileUpload::make('banner')->collection('banner')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('banner')->collection('banner'),
                Tables\Columns\TagsColumn::make('category.category_name'),
                Tables\Columns\TextColumn::make('menu_name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('selling_price'),
                Tables\Columns\TextColumn::make('display_order'),
                Tables\Columns\TextColumn::make('hits'),
                Tables\Columns\ToggleColumn::make('is_published'),
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
