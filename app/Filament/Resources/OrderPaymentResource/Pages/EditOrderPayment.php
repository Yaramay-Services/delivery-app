<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use App\Models\Order;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use ShipdayApi;

class EditOrderPayment extends EditRecord
{
    protected static string $resource = OrderPaymentResource::class;

    protected function getActions(): array
    {
        return [
         //   Actions\DeleteAction::make(),
        ];
    }

    public function afterSave()
    {
        $order = Order::find($this->record->order_id)->load('orderDetails.orderItems');

        dd($order->toArray());
        app(ShipdayApi::class)->insertOrder($order->toArray());
    }
}
