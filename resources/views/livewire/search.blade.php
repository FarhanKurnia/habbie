<div class="relative w-42 ">
    <input wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search"
        class="w-full px-4 py-2 pr-12 rounded-full bg-grey-secondary-50 focus:outline-none" />
    <span class="absolute right-0 top-0 mt-1 mr-2 px-4 py-2 rounded-full  focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </span>

    <div class="relative">
        <div class=" p-4 bg-white rounded shadow overflow-y-auto w-full {{ empty($searchTerm) ? "hidden" : "absolute" }} {{ $dataCount !== 0 ? 'h-96' : '' }}">
            @if ($productResults->isNotEmpty())
                <h3 class="font-bold py-2">Product Results</h3>
                <ul class="space-y-6">
                    @foreach ($productResults as $product)
                        <li>
                            <a href="{{ route('products.show', $product->slug) }}">
                                <span class="grid grid-cols-3 gap-4 items-center">
                                    <div>
                                        <img class="h-18 mx-auto" src="{{ url($product->image) }}"
                                            alt="{{ $product->name }}">
                                    </div>
                                    <div class="col-span-2">
                                        <p class="hover:text-pink-primary">{{ $product->name }}</p>
                                        <div class="text-sm">
                                            @if ($product->discount_id)
                                                @php
                                                    $normalPrice = $product->price;
                                                    $discount = $product->discount->rule;
                                                    $discountPrice = ($discount / 100) * $normalPrice;
                                                    $discountPrice = $normalPrice - $discountPrice;
                                                    $discountName = $product->discount->name;
                                                @endphp
                                                <div class="lg:flex lg:items-center lg:gap-2 ">
                                                    <p class="text-grey-secondary lg:text-right">
                                                        <s>{{ \App\Helpers\CurrencyFormat::data($normalPrice) }}</s>
                                                    </p>
                                                    <p class="font-semibold lg:text-left text-pink-primary">
                                                        {{ \App\Helpers\CurrencyFormat::data($discountPrice) }}</p>
                                                </div>
                                            @else
                                                <p class="font-semibold text-pink-primary">
                                                    {{ \App\Helpers\CurrencyFormat::data($product->price) }}</p>
                                            @endif
                                        </div>
                                        <small></small>
                                    </div>

                                </span>
                            </a>

                        </li>
                    @endforeach
                </ul>
            @endif

            @if ($articleResults->isNotEmpty())
                <h3 class="font-bold py-2 mt-4">Article Results</h3>
                <ul>
                    @foreach ($articleResults as $article)
                    <li>
                        <a href="{{ $article->categories === 'article' ? route('showArticleClient', $article->slug) : route('showCareerClient', $article->slug) }}">

                            <span class="grid grid-cols-3 gap-4 items-center">
                                <div>
                                    <img class="w-full  mx-auto " src="{{ url($article->image) }}"
                                        alt="{{ $article->title }}">
                                </div>
                                <div class="col-span-2">
                                    <p class="hover:text-pink-primary">{{ $article->title }}</p>
                                    <small></small>
                                </div>
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif

            @if ($dataCount > 0)
                <p class="font-bold text-pink-primary py-2 mt-4">Total Results: {{ $dataCount }}</p>
            @else
                <p class="font-bold text-center text-pink-primary py-2 mt-4">No results found.</p>
            @endif
        </div>
    </div>

</div>

</div>
