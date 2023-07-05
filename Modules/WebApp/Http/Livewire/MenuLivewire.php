<?php

namespace Modules\WebApp\Http\Livewire;

use App\Models\Business;
use App\Models\Menu;
use App\Models\MenuCategory;
use Livewire\Component;

class MenuLivewire extends Component
{
    public $queryId;

    public $business;

    public $banner;

    public $menu;

    public $categories;

    protected $queryString = ['queryId'];

    public function mount()
    {
        $this->business = Business::findOrFail(decrypt($this->queryId));

        $this->menu = MenuCategory::with(['menu' => fn ($q) => $q->where('is_published', '1')])
            ->whereHas('menu', fn ($q) => $q->where('is_published', '1'))
            ->where('business_id', $this->business->id)->get();

        $this->categories = MenuCategory::where('business_id', $this->business->id)
            ->whereHas('menu', fn ($q) => $q->where('is_published', '1'))->get()->toArray();
            
        $this->banner = $this->business->getMedia('banner')->first()->getUrl();
    }

    public function render()
    {
        return view('webapp::livewire.menu-livewire')->layout('webapp::layouts.default');
    }
}
