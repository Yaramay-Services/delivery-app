<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Models\Order;
use App\Service\ShipdayApi;
use Filament\Pages\Actions;
use App\Models\OrderDetails;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OrderPaymentResource;

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
        $order = Order::find($this->record->order_id);
        $business = OrderDetails::where('order_id', $order->id)->with('business')->first()->business->toArray();
        $orderDetails = OrderDetails::where('order_id', $order->id)->with('orderItems')->get();

        app(ShipdayApi::class)->insertOrder($order->toArray(), $orderDetails->toArray(), $business);
    }
}
