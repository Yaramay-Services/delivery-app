<div>
    <section class="py-5 overflow-hidden bg-primary restuarant-banner">
    </section>

    <section class="py-3">
        <div class="container">
            <div class="d-flex justify-content-center">
                @foreach ($categories as $category)
                    <div>
                        <button type="button" class="btn btn-primary ms-1">
                            {{ $category['category_name'] }}
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center flex-column">
                @foreach ($menu as $category)
                    <div class="fs-2 fw-bolder mb-3">
                        {{ $category->category_name }}
                    </div>
                    <div class="d-flex">
                        @foreach ($category->menu as $item)
                            <div class="card d-flex flex-row">
                                <img src="{{ $item->getMedia('banner')->first()?->getUrl() }}" alt="" width="64" height="64">
                                <div class="p-2">
                                    {{ $item->menu_name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style scoped>
    .restuarant-banner {
        background-image: url("{{ $banner }}");
        min-height: 350px;
    }
</style>
