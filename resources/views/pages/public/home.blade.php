@extends('layouts.base-layout')

@section('title', 'Habbie Aromatic Telon Oil')

@section('content')

    @if (session()->has('error'))
        <div class="container mx-auto my-4">
            <livewire:alert :message="session('error')" :background="'bg-danger'" />
        </div>
    @endif
    @include('components.public.partials.hero-slider')
    @include('components.public.partials.content-slider', ['products' => $bodyRecommendation])

    <div class="bg-grey-secondary-50">
        <div class="container mx-auto py-14">
            @include('components.public.partials.title', [
                'title' => 'Aromatic By Nature All Around the World',
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

    <div class="container mx-auto py-14">
        <div class="grid lg:grid-cols-2 gap-6">
            @foreach ($latestArticles as $articles)
                @include('components.public.partials.article-card', ['articles' => $articles])
            @endforeach
        </div>
        <div class="text-center py-4">
            <a href="{{ url('media') }}"><button class="btn btn-primary rounded-full font-bold text-white">READ ALL ARTICLES</button></a>
        </div>
    </div>

@endsection
