<div class="container mx-auto">
    <div class="relative">
        <div id="content-slider" class="py-14">
            @foreach ($contents as $content)
                <div>
                    <div class="w-2/3 mx-auto lg:grid lg:grid-cols-3 lg:gap-10  lg:p-10 relative">
                        <div class="image-content h-72 z-20 absolute top-24 left-0">
                            <img class="max-h-72 ml-auto" src="{{ url($content['image']) }}"
                                alt="{{ $content['title'] }}" />
                        </div>
                        <div class="col-span-3 text-content z-10 divide-green divide-y-2 bg-teal py-10 pr-8 rounded-xl pl-24 ml-8">
                            <div class="pb-6">
                                <h3 class="text-3xl font-bold">{{ $content['title'] }}</h3>
                                <h5 class="text-grey">{{ $content['subtitle'] }}</h5>
                            </div>
                            <div class="pt-6">
                                <p class="pb-4">{{ $content['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="prev-btn absolute bottom-1/2 lg:ml-10 ml-4">
            <span class="text-gray-500 text-3xl">❮</span>
        </button>
        <button class="next-btn absolute bottom-1/2 right-0 lg:mr-10 mr-4">
            <span class="text-gray-500 text-3xl">❯</span>
        </button>
    </div>
</div>
