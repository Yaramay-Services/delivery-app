<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Business;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BusinessResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Filament\Resources\BusinessResource\RelationManagers\MenuCategoryRelationManager;
use App\Filament\Resources\BusinessResource\RelationManagers\MenuRelationManager;
use App\Filament\Resources\BusinessResource\RelationManagers\MenuVariationRelationManager;
use App\Filament\Resources\BusinessResource\RelationManagers\OpeningHoursRelationManager;
use App\Filament\Resources\BusinessResource\RelationManagers\VariationCategoryRelationManager;
use App\Models\VariationCategory;

class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;
    protected static ?string $navigationGroup = 'Manage Business';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('business_name')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('city'),
                Forms\Components\TextInput::make('postal'),
                Forms\Components\TextInput::make('longitude')
                    ->required(),
                Forms\Components\TextInput::make('latitude')
                    ->required(),
                Forms\Components\Textarea::make('address')->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('banner')
                    ->collection('banner')
                    ->imageResizeTargetHeight(323)
                    ->imageResizeTargetWidth(383)
                    ->columnSpan(1),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->collection('logo')
                    ->imageResizeTargetHeight(64)
                    ->imageResizeTargetWidth(64)
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('logo')->collection('logo'),
                Tables\Columns\TextColumn::make('business_name'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            VariationCategoryRelationManager::class,
            MenuRelationManager::class,
            OpeningHoursRelationManager::class,
            MenuCategoryRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}
