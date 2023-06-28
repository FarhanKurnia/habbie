@extends('layouts.base-layout')

@section('title', 'Special Offers')
@section('content')

    @php
        $offers = [
            ['title' => 'Offer 1', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus deleniti eligendi incidunt ex consequuntur pariatur alias, repellendus impedit voluptates ab veniam quo, quae eaque labore odit assumenda vero. Natus, beatae.', 'image' => asset('storage/img/img-slide.jpg')],
            ['title' => 'Offer 2', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus deleniti eligendi incidunt ex consequuntur pariatur alias, repellendus impedit voluptates ab veniam quo, quae eaque labore odit assumenda vero. Natus, beatae.', 'image' => asset('storage/img/img-slide.jpg')],
            ['title' => 'Offer 3', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus deleniti eligendi incidunt ex consequuntur pariatur alias, repellendus impedit voluptates ab veniam quo, quae eaque labore odit assumenda vero. Natus, beatae.', 'image' => asset('storage/img/img-slide.jpg')],
            ['title' => 'Offer 4', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus deleniti eligendi incidunt ex consequuntur pariatur alias, repellendus impedit voluptates ab veniam quo, quae eaque labore odit assumenda vero. Natus, beatae.', 'image' => asset('storage/img/img-slide.jpg')],
        ];
    @endphp

    <div class="container mx-auto py-14 px-6">
        @include('components.public.partials.title', [
            'title' => 'Special Offers!',
            'align' => 'left',
            'color' => 'pink-primary',
        ])
        <div class="space-y-14">
            @foreach ($offers as $offer)
                @include('components.public.partials.content-list', ['offer' => $offer])
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

    <div class="h-64 bg-pink-primary overflow-y-hidden">
        <img src="{{ asset('storage/img/img-slide.jpg') }}" alt="" class="object-cover opacity-25 h-full w-full">
    </div>



@endsection
