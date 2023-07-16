@extends('layouts.base-layout')

@section('title', 'Our Products')

@section('content')


    <div class="container mx-auto pt-14 px-6 lg:px-0">
        @include('components.public.partials.title', [
            'title' => 'Our Products',
            'align' => 'left',
            'color' => 'pink-primary',
        ])

    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 items-center lg:space-y-4 lg:space-x-2">
            @foreach ($allProduct as $index => $product)
                @include('components.public.partials.product-card', [
                    'product' => $product,
                    'index' => $index,
                ])
            @endforeach
        </div>
        <div class="p-4 pagination">
            {{ $allProduct->links() }}
        </div>

    </div>
@endsection