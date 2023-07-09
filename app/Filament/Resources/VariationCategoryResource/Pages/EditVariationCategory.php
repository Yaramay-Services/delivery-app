<?php

namespace App\Filament\Resources\VariationCategoryResource\Pages;

use App\Filament\Resources\VariationCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVariationCategory extends EditRecord
{
    protected static string $resource = VariationCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
