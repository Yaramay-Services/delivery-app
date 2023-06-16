<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Business;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BusinessResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BusinessResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;

    protected static ?string $navigationGroup = 'Manage Business';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('business_name')->columnSpanFull()->required(),
                TextInput::make('longitude')->required(),
                TextInput::make('latitude')->required(),
                TextInput::make('city'),
                TextInput::make('postal'),
                TextArea::make('address')->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('banner')
                    ->columnSpanFull()
                    ->responsiveImages()
                    ->image()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('banner')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBusinesses::route('/'),
        ];
    }
}
