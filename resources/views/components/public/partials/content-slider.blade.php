<div class="container mx-auto">
    <div class="relative">
        <div id="content-slider" class="py-14">
            @foreach ($products as $product)
                <div>
                    <div class="w-2/3 mx-auto lg:grid lg:grid-cols-2 lg:gap-10 items-center space-y-10">
                        <div class="image-content h-64">
                            <img class="max-h-64 mx-auto" src="{{ $product->image }}" alt="{{ $product->name }}" />
                        </div>
                        <div class="text-content">
                            <p class="text-gray-400 text-sm text-grey">RECOMMENDATION FOR YOU</p>
                            <h3 class="text-xl font-bold text-pink-primary">{{ $product->name }}</h3>
                            <p class="pb-4">{{ $product->description }}</p>
                            {{-- <button class="btn btn-primary rounded-full font-bold text-white">Shop Now</button> --}}
                            <button class="btn btn-primary rounded-full font-bold text-white" onclick="window.location='{{ route("products.show",$product->product->slug) }}'">Shop Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="prev-btn absolute bottom-1/2 lg:ml-10">
            <span class="text-gray-500 text-3xl">❮</span>
        </button>
        <button class="next-btn absolute bottom-1/2 right-0 lg:mr-10">
            <span class="text-gray-500 text-3xl">❯</span>
        </button>
    </div>
</div>
