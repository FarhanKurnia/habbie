<div class="card {{ $index === 1 ? 'bg-base-100' : 'bg-transparent' }}">
    <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
    <div class="card-body text-center">
        <h2 class="font-bold text-2xl leading-loose">{{ $product['title'] }}</h2>
        <p class="text-sm">{{ $product['description'] }}</p>
        <p class="font-semibold text-lg">{{ $product['price'] }}</p>
        <p class="text-pink-primary">{{ $product['promo'] }}</p>
        <div class="card-actions justify-center pt-4">
            <button class="btn btn-primary rounded-full font-bold text-white">Add to Cart</button>
        </div>
    </div>
</div>