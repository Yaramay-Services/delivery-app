<div>
    <button type="button" class="btn btn-info position-relative" data-bs-toggle="modal" data-bs-target="#orderModal">
        <i class="fa-solid fa-cart-shopping"></i> My Cart
        @if (count($cart))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ count($cart) }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @endif
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($cart as $key => $values)
                            <div class="col-12">
                                <div class="d-flex justify-content-between pe-4">
                                    <label class="fw-bold h6">{{ $values['menu']['menu_name'] }}
                                        x{{ $values['quantity'] }}</label>
                                    <label class="fw-bold h6">SAR {{ $values['menu']['selling_price'] }}</label>
                                </div>
                                @foreach ($values['items'] as $items)
                                    <div class="d-flex justify-content-between pe-4 ps-1">
                                        <label class="h6">{{ $items['menu_variation_name'] }}</label>
                                        <label class="h6">SAR {{ $items['selling_price'] }}</label>
                                    </div>
                                @endforeach
                                <button type="button" wire:click='removeOrder("{{ $key }}")'
                                    class="btn btn-sm btn-warning w-100 mb-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <hr>
                        @endforeach
                        <div class="col-12">
                            <div class="d-flex justify-content-between pe-4">
                                <label class="fw-bold h6">Delivery Fee</label>
                                <label class="fw-bold h6">SAR {{ $deliveryFee }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-between pe-4">
                                <label class="fw-bold h6">Total</label>
                                <label class="fw-bold h6">SAR {{ $total }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if ($total)
                        <button type="button" class="btn btn-primary" wire:click='checkout'>Checkout</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
