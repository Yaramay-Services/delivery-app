<?php

namespace Modules\WebApp\Http\Livewire\Components;

use Livewire\Component;

class NavbarComponent extends Component
{
    public $latitude;

    public $longitude;

    public function render()
    {
        return view('webapp::livewire.components.navbar-component');
    }
}
