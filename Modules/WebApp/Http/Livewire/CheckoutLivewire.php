<?php

namespace Modules\WebApp\Http\Livewire;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderDraft;
use App\Models\OrderItems;
use Livewire\Component;

class CheckoutLivewire extends Component
{
    public $overview;

    public $order;

    public $firstName;

    public $lastName;

    public $email;

    public $city;

    public $address;

    public $phoneNo;

    public $paymentMethod = PaymentMethodEnum::STC_PAY;

    protected $queryString = ['overview'];

    protected $rules = [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'city' => 'required|max:255',
        'address' => 'required|max:500',
        'phoneNo' => 'required|max:50',
        'email' => 'required|email',
    ];

    public function mount()
    {
        $this->order = collect(json_decode(OrderDraft::find($this->overview)->overview))->toArray();
    }

    public function render()
    {
        return view('webapp::livewire.checkout-livewire')->layout('webapp::layouts.default');
    }

    public function confirmPay()
    {
        $validated = $this->validate();

        $order = Order::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'city' => $validated['city'],
            'address' => $validated['address'],
            'phone_no' => $validated['phoneNo'],
            'email' => $validated['email'],
            'total' => $this->order['total'],
            'delivery_fee' => $this->order['delivery_fee'],
            'order_status' => OrderStatusEnum::PENDING,
            'payment_method' => $this->paymentMethod
        ]);

        foreach ($this->order['cart'] as $key => $cart) {
            $orderDetail = OrderDetails::create([
                'order_id' => $order->id,
                'business_id' => $cart['menu']['business_id'],
                'menu_id' => $cart['menu']['id'],
                'group' => $key,
                'quantity' => $cart['quantity'],
                'menu_name' => $cart['menu']['menu_name'],
                'selling_price' => $cart['menu']['selling_price'],
                'sub_total' => $cart['sub_total'],
            ]);
            foreach ($cart['items'] as $item) {
                OrderItems::create([
                    "order_details_id" => $orderDetail->id,
                    "menu_variation_id" => $item['id'],
                    "business_id" => $item['business_id'],
                    "variation_category_id" => $item['variation_category_id'],
                    "price" => $item['price'],
                    "selling_price" => $item['selling_price'],
                    "menu_variation_name" => $item['menu_variation_name']
                ]);
            }
        }

        return $this->redirect(route('stc.checkout', ['f' => encrypt($order->id)]));
    }
}
