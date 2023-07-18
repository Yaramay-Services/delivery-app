<div>
    <section id="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <h4>SHIPPING ADDRESS</h4>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mb-2 px-1">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" wire:model.debounce.500ms="firstName">
                                    @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-2 px-1">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" wire:model.debounce.500ms="lastName">
                                    @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mb-2 px-1 w-100">
                                    <label>Payment Method</label>
                                    <select class="form-select" wire:model.debounce.500ms="paymentMethod">
                                        @foreach (App\Enums\PaymentMethodEnum::cases() as $key => $case)
                                            <option value="{{ $case->value }}" @if (!$key) selected @endif >{{ $case->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 px-1">
                                    <label>City</label>
                                    <input type="text" class="form-control" wire:model.debounce.500ms="city">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div>
                                <div class="form-group mb-2 px-1">
                                    <label>Address</label>
                                    <textarea type="text" class="form-control" wire:model.debounce.500ms="address"></textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-2 px-1">
                                    <label>Mobile Phone</label>
                                    <input type="text" class="form-control" wire:model.debounce.500ms="phoneNo">
                                    @error('phoneNo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-md-5">
                    <div class="card shadow mt-4" wire:ignore>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <h4>ORDER SUMMARY</h4>
                            </div>
                            <div class="row">
                                @foreach ($order['cart'] as $key => $values)
                                    <div class="col-12">
                                        <h6>QUANTITY: {{ $values->quantity ?? $values['quantity'] }}</h6>
                                        <div class="d-flex justify-content-between pe-4">
                                            <label class="fw-bold h6">
                                                {{ $values->menu->menu_name ?? $values['menu']['menu_name'] }}
                                            </label>
                                            <label class="fw-bold h6">
                                                SAR {{ $values->menu->selling_price ?? $values['menu']['selling_price'] }}
                                            </label>
                                        </div>
                                        @foreach ($values->items ?? $values['items'] as $items)
                                            <div class="d-flex justify-content-between pe-4 ps-1">
                                                <label class="h6">
                                                    {{ $items->menu_variation_name ?? $items['menu_variation_name'] }}
                                                </label>
                                                <label class="h6">
                                                    SAR {{ $items->selling_price ?? $items['selling_price'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex flex-column">
                                <div class="d-flex justify-content-between pe-4 ps-1">
                                    <label class="h5">Delivery Fee</label>
                                    <label class="h5">SAR {{ $this->order['delivery_fee'] }}</label>
                                </div>
                                <div class="d-flex justify-content-between pe-4 ps-1">
                                    <label class="h5">Total</label>
                                    <label class="display-6">SAR {{ $this->order['total'] }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-auto mt-5">
                    <button class="btn btn-primary" wire:click='confirmPay'>Confirm & Pay</button>
                </div>
            </div>
        </div>
    </section>
</div>
