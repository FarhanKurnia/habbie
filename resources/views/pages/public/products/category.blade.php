@extends('layouts.base-layout')

@section('title', $productsByCat[0]->category->name)

@section('content')


    <div class="container mx-auto pt-14 px-6 lg:px-0">
        @include('components.public.partials.title', [
            'title' => 'Categories: '. $productsByCat[0]->category->name,
            'align' => 'left',
            'color' => 'pink-primary',
        ])

    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 items-center lg:space-y-4 lg:space-x-2">
            @foreach ($productsByCat as $index => $product)
                @include('components.public.partials.product-card', [
                    'product' => $product,
                    'index' => $index,
                ])
            @endforeach
        </div>
        <div class="py-4 text-right">
            <div class="join">
                <button class="join-item btn">< Prev</button>
                <button class="join-item btn btn-active">Next ></button>
            </div>
        </div>

    </div>
@endsection
