<div class="grid lg:grid-cols-2 gap-6 items-center">
    <div class="">
        <img src="{{ $offer['image'] }}" class=" w-full object-cover rounded-xl" />
    </div>
    <div>
        <h3 class="text-2xl font-bold text-pink-primary lg:py-4">{{ $offer['title'] }}</h3>
        <p>{{ $offer['description'] }}</p>
        <a href="#">
            <button class="btn btn-primary rounded-full font-bold text-white my-6">Shop Now</button>
        </a>
    </div>
</div>