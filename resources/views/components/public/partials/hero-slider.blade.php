<div class="container mx-auto ">
    <div class="slider relative overflow-x-hidden">
        @php
            
            $slide = 1;

        @endphp
        @foreach (range(1, 7) as $item)
            
            <div>
                <img src="{{ asset('storage/img/slide-'.$slide++.'.png') }}" alt="" class=" lg:w-full lg:h-full">
            </div>
        @endforeach
    </div>
</div>