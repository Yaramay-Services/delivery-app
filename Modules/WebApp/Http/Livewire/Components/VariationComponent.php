<?php

namespace Modules\WebApp\Http\Livewire\Components;

use App\Models\Menu;
use Livewire\Component;

class VariationComponent extends Component
{
    protected $listeners = ['getVariations'];

    public $menu;

    public $menuBanner;

    public $menuVariation;

    public function render()
    {
        return view('webapp::livewire.components.variation-component');
    }

    public function getVariations(Menu $menu)
    {
        $this->menu = $menu->load('menuVariation');
        $this->menuBanner = $menu->getMedia('banner')->first()?->getUrl();

        dd($this->menu->menuVariation->whereNull('parent_id'));
    }
}
