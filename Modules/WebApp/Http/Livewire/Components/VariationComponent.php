<?php

namespace Modules\WebApp\Http\Livewire\Components;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\MenuVariation;
use App\Models\VariationCategory;

class VariationComponent extends Component
{
    protected $listeners = ['getVariations'];

    public $menu;

    public $menuBanner;

    public $parentVariations;

    public $selectedParentVariation;

    public $childVariations;

    public $radioGroup = [];

    public $checkboxGroup = [];

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

    public function updatedselectedParentVariation()
    {
        $this->radioGroup = [];
        $this->checkboxGroup = [];
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

    public function addToCart()
    {
        $mergedChildren = collect($this->radioGroup)->values()->toArray() + $this->checkboxGroup;

        $parent = MenuVariation::find($this->selectedParentVariation);
        $orderList = MenuVariation::find($mergedChildren);

        $orderList->push($parent);

        $this->radioGroup = [];
        $this->checkboxGroup = [];
        $this->selectedParentVariation = null;
    }
}
