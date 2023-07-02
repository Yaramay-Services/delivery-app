<?php

namespace Modules\WebApp\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuLivewire extends Component
{
    public $queryId;

    public $businessId;

    public $menu;

    public $categories;

    protected $queryString = ['queryId'];

    public function mount()
    {
        $this->businessId = decrypt($this->queryId);
        $this->menu = Menu::with('menuCategory')->where('business_id', $this->businessId)->get();
        $this->menu->map(function($value){
            foreach($value->menuCategory as $item){
                $this->categories[$item->category_name] = $item->id;
            }
        });
        dump($this->categories);
    }

    public function render()
    {
        return view('webapp::livewire.menu-livewire')->layout('webapp::layouts.default');
    }
}
