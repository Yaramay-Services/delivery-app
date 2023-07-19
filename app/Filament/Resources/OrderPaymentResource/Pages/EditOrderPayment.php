<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderPayment extends EditRecord
{
    protected static string $resource = OrderPaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
