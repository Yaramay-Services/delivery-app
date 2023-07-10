<?php

namespace Modules\WebApp\Http\Livewire\Components;

use App\Models\Menu;
use App\Models\MenuVariation;
use App\Models\VariationCategory;
use Livewire\Component;

class VariationComponent extends Component
{
    protected $listeners = ['getVariations'];

    public $menu;

    public $menuBanner;

    public $parentVariations;

    public $selectedParentVariation;

    public $childVariations;

    public $selectedChildVariation;

    public function render()
    {
        return view('webapp::livewire.components.variation-component');
    }

    public function getVariations(Menu $menu)
    {
        $this->menu = $menu;
        $this->menuBanner = $menu->getMedia('banner')->first()?->getUrl();
        $this->getParentVariations();
    }

    public function getParentVariations()
    {
        $this->parentVariations = VariationCategory::with('menuVariation')
            ->where('menu_id', $this->menu->id)
            ->whereNull('menu_variation_id')
            ->get();
    }

    public function getChildVariations($parentId)
    {
        $this->childVariations = VariationCategory::with('menuVariation')
            ->where('menu_id', $this->menu->id)
            ->where('menu_variation_id', $parentId)
            ->get();
    }
}
