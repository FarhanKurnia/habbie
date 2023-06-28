@extends('layouts.base-layout')

@section('title', 'Our Products')

@section('content')

    {{-- dummy data products --}}
    @php
        $products = [['title' => 'Product 1', 'description' => 'This is Product Description', 'price' => 50000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 2', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 3', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''], ['title' => 'Product 4', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => '']];
    @endphp

    <div class="container mx-auto py-14 px-6 lg:px-0">
        @include('components.public.partials.title', [
            'title' => 'Our Products',
            'align' => 'left',
            'color' => 'pink-primary',
        ])
        <div class="grid grid-cols-2 lg:grid-cols-4 items-center">
            @foreach ($products as $index => $product)
                @include('components.public.partials.product-card', [
                    'product' => $product,
                    'index' => $index,
                ])
            @endforeach
        </div>
        <div class="py-4 text-right">
            <div class="join">
                <button class="join-item btn">1</button>
                <button class="join-item btn btn-active">2</button>
                <button class="join-item btn">3</button>
                <button class="join-item btn">4</button>
            </div>
        </div>
    </div>
@endsection
