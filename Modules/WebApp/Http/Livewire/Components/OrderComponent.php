<?php

namespace Modules\WebApp\Http\Livewire\Components;

use Livewire\Component;

class OrderComponent extends Component
{
    public $cart = [];

    public $total = 0;

    protected $listeners = ['addToCart'];

    public function render()
    {
        return view('webapp::livewire.components.order-component');
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

        $this->total += $subTotal;
    }

    public function removeOrder($key)
    {
        unset($this->cart[$key]);
        $this->recalculate();
    }
}
