<div class="container mx-auto">
    <div class="relative lg:w-3/4 lg:mx-auto">
        <div id="content-slider" class="py-14">
            @foreach ($products as $product)
                <div>
                    <div class="w-2/3 mx-auto lg:grid lg:grid-cols-2 lg:gap-10 items-center">
                        <div class="image-content pb-4">
                            <img src="{{ asset('storage/img/img-slide.jpg') }}" alt="Slide Image" />
                        </div>
                        <div class="text-content">
                            <p class="text-gray-400 text-sm text-grey">RECOMMENDATION FOR YOU</p>
                            <h3 class="text-2xl font-bold text-pink-primary">{{ $product['title'] }}</h3>
                            <p class="pb-4">{{ $product['description'] }}</p>
                            <button class="btn btn-primary rounded-full font-bold text-white">Shop Now</button>
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
