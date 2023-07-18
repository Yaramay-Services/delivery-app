<?php

namespace Modules\WebApp\Http\Livewire;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\OrderDetails;
use Livewire\Component;

class CheckoutLivewire extends Component
{
    public $overview;

    public $order;

    public $firstName;

    public $lastName;

    public $city;

    public $address;

    public $phoneNo;

    public $paymentMethod = 'credit_debit';

    protected $queryString = ['overview'];

    protected $rules = [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'city' => 'required|max:255',
        'address' => 'required|max:500',
        'phoneNo' => 'required|max:50',
    ];

    public function mount()
    {
        $this->order = collect(json_decode(decrypt($this->overview)))->toArray();
    }

    public function render()
    {
        return view('webapp::livewire.checkout-livewire')->layout('webapp::layouts.default');
    }

    public function confirmPay()
    {
        $validated = $this->validate();
        $order = null;

        $order = Order::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'city' => $validated['city'],
            'address' => $validated['address'],
            'phone_no' => $validated['phoneNo'],
            'total' => $this->order['total'],
            'delivery_fee' => $this->order['delivery_fee'],
            'order_status' => OrderStatusEnum::PENDING
        ]);

        foreach ($this->order['cart'] as $key => $cart) {
            OrderDetails::create([
                'order_id' => $order->id,
                'business_id' => $cart['menu']['business_id'],
                'menu_id' => $cart['menu']['id'],
                'group' => $key,
                'menu_name' => $cart['menu']['menu_name'],
                'price' => $cart['menu']['price'],
                'selling_price' => $cart['menu']['selling_price']
            ]);
        }
    }
}
