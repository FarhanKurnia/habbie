<div class="card py-4{{ $index === 1 ? 'bg-base-100' : 'bg-transparent' }}">
    <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
    <div class="card-body text-center">
        <h3 class="font-bold text-xl lg:text-2xl leading-loose">{{ $product['title'] }}</h3>
        <p class="text-sm">{{ $product['description'] }}</p>
        <p class="font-semibold text-lg">{{ \App\Helpers\CurrencyFormat::data($product['price']) }}</p>
        <p class="text-pink-primary">{{ $product['promo'] }}</p>
        <div class="card-actions justify-center pt-4">
            <button class="btn btn-sm btn-primary rounded-full font-bold text-white text-md">Add to Cart</button>
        </div>
    </div>
</div>