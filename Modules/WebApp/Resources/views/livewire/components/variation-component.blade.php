<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="variationModal" tabindex="-1" aria-labelledby="variationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="variationModalLabel">Add To Cart & Variations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($menu)
                        <div class="product-variation-banner"
                            style="background-image: url('{{ $menuBanner ?? config('media-library.placeholder') }}');">
                        </div>
                        <div class="d-flex flex-column mt-3">
                            <h4>{{ $menu->menu_name }}</h4>
                            <p>{{ $menu->description }}</p>
                        </div>
                        <hr>
                        @foreach ($parentVariations as $parent)
                            <div class="d-flex flex-column mt-3">
                                <h4>{{ $parent->name }}</h4>
                                @foreach ($parent->menuVariation as $variation)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $variation->id }}"
                                            wire:click='getChildVariations({{ $variation->id }})'
                                            wire:model='selectedParentVariation' name="{{ Str::slug($parent->name) }}">
                                        <label class="form-check-label w-100 d-flex justify-content-between"
                                            for="flexCheckDefault">
                                            <label>{{ $variation->menu_variation_name }}</label>
                                            <label>+SAR {{ $variation->selling_price }}</label>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        @foreach ($childVariations ?? [] as $child)
                            <div class="d-flex flex-column mt-3">
                                <h4>{{ $child->name }}</h4>
                                @foreach ($child->menuVariation as $variation)
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            value="{{ $variation->id }}"
                                            wire:model='selectedChildVariation'
                                            name="{{ Str::slug($child->name) }}">
                                        <label class="form-check-label w-100 d-flex justify-content-between"
                                            for="flexCheckDefault">
                                            <label>{{ $variation->menu_variation_name }}</label>
                                            <label>+SAR {{ $variation->selling_price }}</label>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>

    <style scoped>
        .product-variation-banner {
            height: 171px;
            background-size: cover;
            background-position-y: -83px;
        }
    </style>
</div>
