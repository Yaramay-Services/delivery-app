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
        $this->parentVariations = VariationCategory::query()
            ->join('menu_variations as mv', 'mv.variation_category_id', '=', 'variation_categories.id')
            ->where('mv.menu_id', $this->menu->id)
            ->whereNull('mv.parent_id')
            ->get();
    }

    public function getChildVariations()
    {
        $parentId = $this->selectedParentVariation;

        $this->childVariations = VariationCategory::query()
            ->join('menu_variations as mv', 'mv.variation_category_id', '=', 'variation_categories.id')
            ->where('mv.menu_id', $this->menu->id)
            ->where('mv.parent_id', $parentId)
            ->get();
    }
}
