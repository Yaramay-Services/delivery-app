<div>
    <section class="py-5 overflow-hidden bg-primary restuarant-banner">
    </section>

    <section class="py-3">
        <div class="container">
            <div class="d-flex justify-content-center">
                @foreach ($categories as $category)
                    <div>
                        <a href="#{{ $category['category_name'] }}" class="btn btn-primary ms-1">
                            {{ $category['category_name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center flex-column">
                @foreach ($menu as $category)
                    <div class="fs-2 fw-bolder my-3">
                        {{ $category->category_name }}
                    </div>
                    <div class="row" id="{{ $category->category_name }}">
                        @foreach ($category->menu as $item)
                            <div class="card d-flex flex-row col-md-3 py-2 shadow m-2" wire:click='loadMenu({{ $item->id }})'
                            data-bs-toggle="modal" data-bs-target="#variationModal">
                                <div class="p-2 w-100 d-flex flex-column">
                                    <label class="fw-bold">{{ $item->menu_name }}</label>
                                    <label class="fw-muted">{{ Str::limit($item->description, 20) }}</label>
                                </div>
                                <img src="{{ $item->getMedia('banner')->first()?->getUrl() ?? config('media-library.placeholder') }}" alt="" width="90" height="90">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <livewire:webapp::components.variation-component>
</div>

<style scoped>
    .restuarant-banner {
        background-image: url("{{ $banner }}");
        min-height: 350px;
    }
</style>
