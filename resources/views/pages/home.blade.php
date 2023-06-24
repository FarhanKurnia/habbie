@extends('layouts.base-layout')

@section('title', 'Habbie Aromatic Telon Oil')

@section('content')
    @include('components.public.partials.hero-slider')
    @include('components.public.partials.content-slider')

    {{-- dummy data products --}}
    @php
        $products = [
            ['title' => 'Product 1', 'description' => 'This is Product Description', 'price' => 50000, 'discount' => 0, 'promo' => ''], 
            ['title' => 'Product 2', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''],
            ['title' => 'Product 3', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''],
            ['title' => 'Product 4', 'description' => 'This is Product Description', 'price' => 60000, 'discount' => 0, 'promo' => ''],
        ];
    @endphp

    <div class="bg-grey-secondary-50">
        <div class="container mx-auto py-14">
            <div class="grid lg:grid-cols-4  product-item items-center">
                @foreach ($products as $index => $product)
                    @include('components.public.partials.product-card', ['product' => $product, 'index' => $index])
                @endforeach
            </div>
        </div>
    </div>

@endsection
