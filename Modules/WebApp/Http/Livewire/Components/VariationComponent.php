<?php

namespace Modules\WebApp\Http\Livewire\Components;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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

    public $quantity = 1;

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
        $this->childVariations = [];

        $this->getParentVariations();
    }

    public function updatedselectedParentVariation()
    {
        $this->radioGroup = [];
        $this->checkboxGroup = [];
        $this->childVariations = [];
        $this->quantity = 1;
    }

    public function getParentVariations()
    {
        $this->parentVariations = VariationCategory::with('menuVariation')
            ->where('menu_id', $this->menu->id)
            ->whereNull('menu_variation_id')
            ->get();

        $this->selectedParentVariation = $this->parentVariations[0]->menuVariation[0]?->id;
        $this->getChildVariations($this->selectedParentVariation);
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

        $this->emit(
            'addToCart',
            [
                $this->menu->menu_name . '-' . Str::uuid() => [
                    'menu' => $this->menu,
                    'items' => $orderList,
                    'quantity' => $this->quantity
                ]
            ]
        );

        $this->radioGroup = [];
        $this->checkboxGroup = [];
        $this->quantity = 1;
        $this->selectedParentVariation = null;
    }

    public function increment()
    {
        $this->quantity += 1;
    }

    public function decrement()
    {
        if ($this->quantity != 1) {
            $this->quantity -= 1;
        }
    }
}
