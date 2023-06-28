<div class="container mx-auto ">
    <div class="slider relative">
        @foreach (range(1, 4) as $item)
            <div>
                <img src="{{ asset('storage/img/img-slide.jpg') }}" alt="" class="w-full object-cover "
                    style="height: 520px;">
            </div>
        @endforeach
    </div>
</div>
