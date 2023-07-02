<?php

namespace Modules\WebApp\Http\Livewire\Components;

use Livewire\Component;

class HeroComponent extends Component
{
    public $latitude = 0;
    public $longitude = 0;

    public function render()
    {
        return view('webapp::livewire.components.hero-component');
    }

    public function findFood()
    {
        return redirect()->route('restaurants', ['lat' => $this->latitude, 'lng' => $this->longitude]);
    }
}
