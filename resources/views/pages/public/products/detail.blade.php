@extends('layouts.base-layout')

@section('title', $oneProduct->name)

@section('content')
    <div class="container mx-auto py-14">
        <div class="grid lg:grid-cols-2 items-center px-6 space-y-6">
            <div class="h-72 mx-auto">
                <img class="h-72" src="{{ url($oneProduct->image) }}" alt="{{ $oneProduct->name }}" />
            </div>
            <div>
                <div class="">
                    <h3 class="text-2xl font-bold text-pink-primary">{{ $oneProduct->name }}</h3>
                    <p class="text-grey">{{ $oneProduct->category->name }}</p>
                </div>

                <div class="flex flex-row pt-2">
                    @php
                        $maxRating = 5;
                        $fillRating = $oneProduct->rating;
                        $emptyRating = $maxRating - $fillRating;
                    @endphp

                    @for ($i = 1; $i <= $fillRating; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" fill="#f9d800" stroke="#8c8c8c"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    @endfor

                    @for ($i = 1; $i <= $emptyRating; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke="#8c8c8c"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    @endfor

                </div>

                <div class="py-4">
                    <p>{{ $oneProduct->description }}</p>
                </div>

                <div>
                    @if ($oneProduct->discount_id)
                        @php
                            $normalPrice = $oneProduct->price;
                            $discount = $oneProduct->discount->rule;
                            $discountPrice = ($discount / 100) * $normalPrice;
                            $discountPrice = $normalPrice - $discountPrice;
                            $discountName = $oneProduct->discount->name;
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
                        <p class="font-semibold text-lg">{{ \App\Helpers\CurrencyFormat::data($oneProduct->price) }}</p>
                    @endif

                    <div class="flex items-center gap-4">
                        <livewire:counter />
                        <livewire:add-to-cart key="{{ $oneProduct->id_product }}" :product="$oneProduct" />
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-grey-secondary-50">
        <div class="container mx-auto py-14">
            @include('components.public.partials.title', [
                'title' => 'Produk Lain untuk Kamu',
                'align' => 'center',
                'color' => 'pink-primary',
            ])

            {{-- desktop --}}
            <div class="hidden lg:grid lg:grid-cols-4 grid-cols-1 product-item items-center">
                @foreach ($latestRecommendation as $index => $product)
                    @include('components.public.partials.product-card', [
                        'product' => $product,
                        'index' => $index,
                    ])
                @endforeach
            </div>

            {{-- mobile --}}
            <div class="overflow-x-hidden">
                <div class="carousel w-full lg:hidden gap-4">
                    @foreach ($latestRecommendation as $index => $product)
                        <div class="carousel-item w-2/3">
                            @include('components.public.partials.product-card', [
                                'product' => $product,
                                'index' => $index,
                            ])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
