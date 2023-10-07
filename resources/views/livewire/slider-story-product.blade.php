<div class="container mx-auto">
    <div class="relative">
        <div id="content-slider-about" class="pb-4">
            @if (!$loading)
                @foreach ($selectedData as $data)
                    <div>
                        <div class="w-2/3 mx-auto lg:grid lg:grid-cols-3 lg:gap-10 items-center  lg:p-10">
                            <div class="mb-8 lg:mb-0">
                                <img class="h-64 lg:h-80 lg:ml-auto mx-auto" src="{{ url($data['image']) }}"
                                    alt="{{ $data['name'] }}">
                            </div>
                            <div class="col-span-2 divide-green divide-y-2 bg-grey-secondary-50 p-8 rounded-xl">
                                <div class="pb-6">
                                    <h3 class="text-xl lg:text-3xl font-bold">{{ $data['name'] }}</h3>
                                </div>
                                <div class="pt-6">
                                    <p>{{ $data['story'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Loading</p>
            @endif
        </div>
        <button class="prev-btn absolute bottom-1/2 lg:ml-10 ml-4">
            <span class="text-gray-500 text-3xl">❮</span>
        </button>
        <button class="next-btn absolute bottom-1/2 right-0 lg:mr-10 mr-4">
            <span class="text-gray-500 text-3xl">❯</span>
        </button>
    </div>
    <div class="lg:w-2/3 mx-auto px-6 my-4 lg:my-0">
        <ul class="grid grid-cols-4 gap-4 items-center justify-between">
            @foreach ($categories as $category)
                <li class="cursor-pointer lg:p-0" wire:click="handleIconClick({{ $category->id_category }})">
                    <img class="lg:w-1/2 mx-auto p-4 bg-grey-secondary-50 {{ $activeSlide == $category->id_category ? 'border-pink-primary focus:border-pink-primary hover:border-pink-primary' : 'border-grey-secondary-50 hover:border-grey-secondary' }} rounded-full border-2 border-grey-secondary-50"
                        src="{{$category->icon}}" alt="{{ $category->name }}">
                    <p
                        class="hidden lg:block text-center text-xs lg:text-sm my-4 {{ $activeSlide == $category->id_category ? 'text-grey' : 'text-grey-secondary' }}">
                        {{ $category->name }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('slideChanges', function() {
            $(document).ready(function() {

                var contentSlider = $('#content-slider-about');
                contentSlider.slick({
                    arrows: false,
                    swipe: true,
                });

                $('.prev-btn').on('click', function() {
                    contentSlider.slick('slickPrev');
                });

                $('.next-btn').on('click', function() {
                    contentSlider.slick('slickNext');
                });
            });
        })
    });
</script>
