<div>
    @if ($menu)
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
                        <div class="product-variation-banner">
                        </div>
                        <div class="d-flex flex-column mt-3">
                            <h4>{{ $menu->menu_name }}</h4>
                            <p>{{ $menu->description }}</p>
                        </div>
                        <hr>
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
                background-image: url('{{ $menuBanner }}');
                height: 171px;
                background-size: cover;
                background-position-y: -83px;
            }
        </style>
    @endif
</div>
