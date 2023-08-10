@extends('layouts.base-layout')

@section('title', 'Special Offers')
@section('content')


    <div class="container mx-auto pt-14 px-6">
        @include('components.public.partials.title', [
            'title' => 'Special Offers!',
            'align' => 'left',
            'color' => 'pink-primary',
        ])
        <div class="space-y-14">
            @foreach ($offers as $index => $offer)
                @include('components.public.partials.content-list', ['offer' => $offer, $index])
            @endforeach
        </div>

        <div class="p-4 pagination">
            {{ $offers->links() }}
        </div>
    </div>

    <div class="h-64 bg-pink-primary overflow-y-hidden">
        <img src="{{ asset('storage/img/slides/img-slide.jpg') }}" alt="" class="object-cover opacity-25 h-full w-full">
    </div>



@endsection
