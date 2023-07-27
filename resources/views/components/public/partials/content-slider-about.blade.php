<div class="container mx-auto">
    <div class="relative">
        <div id="content-slider" class="py-14">
            @foreach ($contents as $content)
                <div>
                    <div class="w-2/3 mx-auto lg:grid lg:grid-cols-2 lg:gap-10  lg:p-10 relative">
                        <div class="hidden lg:block absolute right-0 top-0 bg-teal px-60 py-36 z-2 rounded-xl"></div>
                        <div class="image-content h-64 z-10">
                            <img class="max-h-64 mx-auto" src="{{ url($content['image']) }}"
                                alt="{{ $content['title'] }}" />
                        </div>
                        <div class="text-content z-10 divide-y lg:bg-transparent lg:p-0  bg-teal-shadow p-4 rounded">
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
        <button class="prev-btn absolute bottom-1/2 lg:ml-10">
            <span class="text-gray-500 text-3xl">❮</span>
        </button>
        <button class="next-btn absolute bottom-1/2 right-0 lg:mr-10">
            <span class="text-gray-500 text-3xl">❯</span>
        </button>
    </div>
</div>
