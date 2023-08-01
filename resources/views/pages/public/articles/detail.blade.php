@extends('layouts.base-layout')

@section('title', $oneArticle->title)
@section('content')

    @php
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $oneArticle->updated_at)->format('l, d F Y');
    @endphp

    <div class="container mx-auto py-10 divide-y-2 divide-grey-secondary">
        <div class="pb-10">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-pink-primary">{{ $oneArticle->title }}</h1>
                <small class="text-grey-secondary">{{ $date }}</small>
            </div>
    
            <div class="image lg:w-5/6 py-6 lg:mx-auto flex justify-center items-center">
                <img src="{{ url($oneArticle->image) }}" alt="$oneArticle->title" class="lg:rounded-lg">
            </div>
    
            <div class="content lg:w-3/4 lg:mx-auto mx-10 ">
                {{ $oneArticle->post }}
            </div>
        </div>

        <div class="w-5/6 mx-auto pt-10">
            <h4 class="font-bold text-lg pb-4 text-pink-primary">Latest Articles</h4>
            <div class="grid lg:grid-cols-4 grid-cols-2 gap-2 lg:gap-4">
                @foreach($latestArticles as $article)            
                <div class="flex flex-col gap-1 pb-4">
                    <a href="{{ url('media/'.$article->slug) }}"><img src="{{ url($article->image) }}" alt="{{ $article->title }}" class="rounded"></a>
                    <span class="p-2">
                        <a href="{{ url('media/'.$article->slug) }}"><p class="font-bold hover:text-pink-primary">{{ $article->title }}</p></a>
                        <p class="text-sm text-grey-secondary">{{ $article->excerpt }}</p>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
