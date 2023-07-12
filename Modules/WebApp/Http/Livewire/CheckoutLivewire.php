<?php

namespace Modules\WebApp\Http\Livewire;

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
        $this->validate();
    }
}
