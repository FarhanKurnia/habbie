<div class="grid lg:grid-cols-2 gap-6 items-top {{ $offer['status'] === 'non-active' ? 'opacity-25' : '' }}">
    <a href="{{ $offer['status'] === 'non-active' ? '#' : url('/products/'. $offer->product['slug']) }}">
        <div class="bg-grey-secondary-50 rounded relative">
            @if ($index < 4 && $offer['status'] === 'active')                
                <span class="bg-danger py-2 px-8 absolute left-0 top-4 rounded-r-full">
                    <p class="text-white font-bold text-xl">New</p> 
                </span>
            @endif
                <img src="{{ $offer['image'] }}" class="w-full rounded-xl" />
        </div>
        <div>
            <h3 class="text-2xl font-bold text-pink-primary lg:py-4">{{ $offer['name'] }}</h3>
            <p>{{ $offer['description'] }}</p>
            <a href="{{ $offer['status'] === 'non-active' ? '#' : url('/products/'. $offer->product['slug']) }}">
                <button {{ $offer['status'] === 'non-active' ? 'disabled' : '' }} class="btn btn-primary rounded-full font-bold text-white my-6">Shop Now</button>
            </a>
        </div>
    </a>
</div>