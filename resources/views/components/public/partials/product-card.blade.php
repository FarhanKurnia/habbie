<div class="card pt-8 pb-4 {{ $index === 1 ? 'bg-base-100' : 'bg-transparent' }}">
    <a href="{{ route('products.show', [$product->slug]) }}">
        <figure><img class="w-1/5 lg:w-1/4" src="{{ url($product->image) }}" alt="{{ $product->name }}" /></figure>
    </a>
    <a href="{{ route('products.show', [$product->slug]) }}">
        <div class="card-body text-center">
            <h3 class="font-bold lg:text-lg hover:text-pink-primary">{{ $product->name }}</h3>
            <div class="pt-4">
                <p class="text-sm lg:text-md">{{ $product->category->name }}</p>

                @if ($product['discount_id'])
                    @php
                        $normalPrice = $product->price;
                        $discount = $product->discount->rule;
                        $discountPrice = ($discount / 100) * $normalPrice;
                        $discountPrice = $normalPrice - $discountPrice;
                        $discountName = $product->discount->name;
                    @endphp

                    <div class="lg:flex lg:items-center lg:gap-2 ">
                        <p class="text-grey-secondary lg:text-right text-lg">
                            <s>{{ \App\Helpers\CurrencyFormat::data($normalPrice) }}</s>
                        </p>
                        <p class="font-semibold text-lg lg:text-left">
                            {{ \App\Helpers\CurrencyFormat::data($discountPrice) }}</p>
                    </div>
                    <p class="text-pink-primary text-lg">{{ $discountName }}</p>
                @else
                    <p class="font-semibold text-lg">{{ \App\Helpers\CurrencyFormat::data($product->price) }}</p>
                    <br />
                @endif
            </div>
    </a>
    <livewire:add-to-cart key="{{ $product->id_product }}" :product="$product" />
</div>
</div>
