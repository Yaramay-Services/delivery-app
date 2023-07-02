<?php

namespace Modules\WebApp\Http\Livewire;

use App\Models\Business;
use Livewire\Component;

class RestaurantLivewire extends Component
{
    public $lat;
    public $lng;
    public $restaurants;

    protected $queryString = ['lat', 'lng'];
    // select * from stores where lat!='' and lng!='' and ( 3959 * acos( cos( radians(" . $centerpoints['lat'] . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $centerpoints['lng'] . ") ) + sin( radians(" . $centerpoints['lat'] . ") ) * sin( radians( lat ) ) ) ) < " . $distanceInMile
    public function mount()
    {
        $this->restaurants = Business::query()
            ->whereHas(
                'openingHour',
                function ($query) {
                    $query->where('day', now()->format('l'));
                }
            )->with(['media', 'openingHour' => function ($query) {
                $query->where('day', now()->format('l'));
            }])
            ->whereRaw("SQRT( POW(69.1 * (`latitude` - $this->lng), 2) + POW(69.1 * ($this->lat - `longitude`) * COS(`latitude` / 57.3), 2)) < 10")
            ->get();
    }

    public function render()
    {
        return view('webapp::livewire.restaurant-livewire')->layout('webapp::layouts.default');
    }
}
