<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderPayments extends ListRecords
{
    protected static string $resource = OrderPaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
