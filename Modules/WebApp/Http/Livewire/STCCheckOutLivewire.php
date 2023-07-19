<?php

namespace Modules\WebApp\Http\Livewire;

use App\Enums\PaymentMethodEnum;
use App\Models\Order;
use App\Models\OrderPayment;
use Livewire\Component;

class STCCheckOutLivewire extends Component
{
    public $f;

    public $refNo;

    protected $queryString = ['f'];

    public $order;

    public $orderPayment;

    protected $rules = ['refNo' => 'required'];

    public function mount()
    {
        $this->order = Order::with('orderPayment')->find(decrypt($this->f));
    }

    public function render()
    {
        $this->orderPayment = $this->order->orderPayment;

        return view('webapp::livewire.s-t-c-check-out-livewire')->layout('webapp::layouts.default');
    }

    public function pay()
    {
        $this->validate();

        $this->orderPayment = OrderPayment::create([
            'order_id' => $this->order->id,
            'payment_method' => PaymentMethodEnum::STC_PAY,
            'ref_no' => $this->refNo,
            'is_confirmed' => false
        ]);
    }
}
