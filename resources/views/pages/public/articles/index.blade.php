@extends('layouts.base-layout')

@section('title', 'Media')
@section('content')
    @php
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $oneArticle->updated_at)->format('l, d F Y');
    @endphp
    <div class="container mx-auto py-4 divide-y-2 divide-grey-secondary">
        <img class="w-full object-cover" src="{{ url($oneArticle->image) }}" alt="{{ $oneArticle->title }}">
        <div class="py-10">
            <div class="text-center pb-6">
                <h1 class="text-2xl font-bold text-pink-primary">{{ $oneArticle->title }}</h1>
                <small class="text-grey-secondary">{{ $date }}</small>
            </div>
            <div class="lg:w-3/4 lg:mx-auto mx-10">
                {!! $oneArticle->post !!}
            </div>
        </div>

        <div class="pt-10">
            <div class="text-center my-4">
                <h4 class="font-bold text-xl px-4 py-2 rounded-lg inline-block text-pink-primary bg-pink-bloosom">Latest
                    Articles
                </h4>
            </div>
            <div class="grid lg:grid-cols-2">
                @foreach ($relatedArticles as $articles)
                    @include('components.public.partials.article-card', ['articles' => $articles])
                @endforeach
            </div>
            <div class="p-4 pagination">
                {{ $relatedArticles->links() }}
            </div>
        </div>
    </div>
@endsection
