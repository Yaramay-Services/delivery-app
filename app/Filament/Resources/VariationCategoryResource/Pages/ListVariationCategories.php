<?php

namespace App\Filament\Resources\VariationCategoryResource\Pages;

use App\Filament\Resources\VariationCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVariationCategories extends ListRecords
{
    protected static string $resource = VariationCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
