<div class="container mx-auto">
    <div class="relative">
        <div id="content-slider" class="py-14">
            @foreach ($contents as $content)
                <div>
                    <div class="lg:w-2/3 lg:mx-auto mx-14 lg:grid lg:grid-cols-2 lg:gap-10 space-y-10 lg:space-y-0 items-center">
                        <div class="image-content h-64">
                            <img class="h-full w-full object-cover mx-auto" src="{{ $content['image'] }}" alt="{{ $content['name'] }}" />
                        </div>
                        <div class="text-content flex flex-col gap-4">
                            <span>
                                <h3 class="text-xl font-bold text-pink-primary">{{ $content['name'] }}</h3>
                                <p class="text-sm text-grey-secondary">{{ $content['profesi'] . ", " . $content['lokasi']}}</p>
                            </span>
                            <p>{!! $content['description'] !!}</p>
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
