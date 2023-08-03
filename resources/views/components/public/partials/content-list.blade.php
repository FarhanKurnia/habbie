<div class="grid lg:grid-cols-2 gap-6 items-top">
    <a href="{{ url('/products/'. $offer->product['slug']) }}">
        <div class="bg-grey-secondary-50 p-8 rounded relative">
            @if ($index < 4)                
            <span class="bg-pink-primary p-6 absolute left-0 top-0 rounded">
                <p class="text-white font-bold text-xl">New</p> 
            </span>
            @endif
            {{-- <p>{{$index}}</p> --}}
            <img src="{{ $offer->product['image'] }}" class="h-60 mx-auto rounded-xl" />
        </div>
        <div>
            <h3 class="text-2xl font-bold text-pink-primary lg:py-4">{{ $offer['name'] }}</h3>
            <p>{{ $offer['description'] }}</p>
            <a href="{{ url('/products/'. $offer->product['slug']) }}">
                <button class="btn btn-primary rounded-full font-bold text-white my-6">Shop Now</button>
            </a>
        </div>
    </a>
</div>