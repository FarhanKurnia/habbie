<div class="container mx-auto relative flex justify-center">
    {{-- slider hero image --}}
    <div class="carousel w-full" style="height: 520px;">
        @foreach (range(1, 4) as $item)
            <div id="item{{ $item }}" class="carousel-item w-full">
                <img src="{{ asset('storage/img/img-slide.jpg') }}" class="w-full object-cover" />
            </div>
        @endforeach
    </div>
    <div class="absolute bottom-0 ">
        {{-- slider hero control --}}
        <div class="flex justify-center w-full py-2 gap-4">
            @foreach (range(1, 4) as $item)
                <a href="#item{{ $item }}" class="p-1.5 bg-grey rounded-full"></a>
            @endforeach
        </div>
    </div>
</div>
