<div>
    <section>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        @if (!$this->orderPayment)
                            <div class="row">
                                <div class="col-12">
                                    <label>STC Pay Ref No.</label>
                                    <input class="form-control" wire:model='refNo' />
                                    @error('refNo')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="button" class="btn btn-primary w-100" wire:click='pay'>Send Proof of
                                        Payment</button>
                                </div>
                            </div>
                        @else
                            @if (!$this->orderPayment->is_confirmed)
                                <h2>PENDING</h2>
                            @else
                                <h2>Payment has been CONFIRMED, wait for shipday sms to track your order.</h2>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
