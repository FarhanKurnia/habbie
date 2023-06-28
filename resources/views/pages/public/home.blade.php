@extends('layouts.base-layout')

@section('title', 'Habbie Aromatic Telon Oil')

@section('content')
    {{-- dummy data products --}}
    @php
        $products = [['title' => 'Product 1', 'description' => 'This is Product Description', 'price' => 50000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 2', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 3', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 4', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => '']];
    @endphp

    @include('components.public.partials.hero-slider')
    @include('components.public.partials.content-slider', ['products' => $products])


    <div class="bg-grey-secondary-50">
        <div class="container mx-auto py-14">
            @include('components.public.partials.title', [
                'title' => 'Aromatic By Nature All Around the World',
                'align' => 'center',
                'color' => 'pink-primary'
            ])

            {{-- desktop --}}
            <div class="hidden lg:grid lg:grid-cols-4 grid-cols-1 product-item items-center">
                @foreach ($products as $index => $product)
                    @include('components.public.partials.product-card', [
                        'product' => $product,
                        'index' => $index,
                    ])
                @endforeach
            </div>

            {{-- mobile --}}
            <div class="overflow-x-hidden">
                <div class="carousel w-full lg:hidden">
                    @foreach ($products as $index => $product)
                        <div class="carousel-item">
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

    <div class="container mx-auto py-14">
        <div class="grid lg:grid-cols-2 gap-6">
            <div class="p-4">
                <img class="py-2 rounded-xl" src="{{ asset('storage/img/img-slide.jpg') }}" alt="" />
                <h4 class="text-pink-primary font-bold text-xl py-2">Mengenal Produk Habbie di Star FM Jogja</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, dignissimos. Laudantium mollitia blanditiis
                    nam beatae vero iusto? Iusto, dicta minima, voluptatibus eum quos quis consequuntur doloremque cumque
                    saepe odit officia.</p>
                <a href="#" class="text-pink-primary italic">Read More</a>
            </div>
            <div class="p-4">
                <img class="py-2 rounded-xl" src="{{ asset('storage/img/img-slide.jpg') }}" alt="" />
                <h4 class="text-pink-primary font-bold text-xl py-2">Mengenal Produk Habbie di Star FM Jogja</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, dignissimos. Laudantium mollitia blanditiis
                    nam beatae vero iusto? Iusto, dicta minima, voluptatibus eum quos quis consequuntur doloremque cumque
                    saepe odit officia.</p>
                <a href="#" class="text-pink-primary italic">Read More</a>
            </div>
        </div>
        <div class="text-center py-4">
            <button class="btn btn-primary rounded-full font-bold text-white">READ ALL ARTICLES</button>
        </div>
    </div>

@endsection
