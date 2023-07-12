<?php

namespace Modules\WebApp\Http\Livewire\Components;

use Livewire\Component;

class OrderComponent extends Component
{
    public $cart = [];

    protected $listeners = ['addToCart'];

    public function render()
    {
        return view('webapp::livewire.components.order-component');
    }

    public function addToCart($menu)
    {
        foreach ($menu as $key => $item) {
            $this->cart[$key] = $item;
        }
    }
}
