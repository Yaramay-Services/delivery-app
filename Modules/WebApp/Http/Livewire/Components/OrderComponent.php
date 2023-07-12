<?php

namespace Modules\WebApp\Http\Livewire\Components;

use Livewire\Component;

class OrderComponent extends Component
{
    public $cart = [];

    public $total = 0;

    public $distance = 0;

    public $deliveryFee = 0;

    protected $listeners = ['addToCart', 'setDistance'];

    public function render()
    {
        return view('webapp::livewire.components.order-component');
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;
        $this->deliveryFee = round($distance * 12, 2);

        $this->recalculate();
    }

    public function addToCart($menu)
    {
        foreach ($menu as $key => $value) {
            $this->cart[$key] = $value;
        }
        $this->recalculate();
    }

    public function checkout()
    {
        $this->recalculate();
        $overview = [
            'cart' => $this->cart,
            'delivery_fee' => $this->deliveryFee,
            'total' => $this->total
        ];

        return redirect()->to(route('checkout', ['overview' => encrypt(json_encode($overview))]));
    }

    public function recalculate()
    {
        $subTotal = 0;
        $this->total = 0;

        foreach ($this->cart as $value) {
            $subTotal += $value['menu']['selling_price'];
            foreach ($value['items'] as $item) {
                $subTotal += $item['selling_price'];
            }

            $subTotal *= $value['quantity'];
        }

        $this->total += $subTotal + $this->deliveryFee;
    }

    public function removeOrder($key)
    {
        unset($this->cart[$key]);
        $this->recalculate();
    }
}
