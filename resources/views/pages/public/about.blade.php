@extends('layouts.base-layout')

@section('title', 'About us')
@section('content')
    @include('components.public.partials.hero-slider')

    <div class="container mx-auto py-14">
        @include('components.public.partials.title', [
            'title' => 'Apa itu Minyak Telon?',
            'align' => 'center',
            'color' => 'pink-primary',
        ])
        <div class="mx-6 lg:w-1/2 lg:mx-auto">
            <img class="pb-6" src="{{ asset('storage/img/img-slide.jpg') }}" alt="minyak telon habbie">
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat.<br /><br />Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.</p>
        </div>
    </div>

    <div class="bg-pink-bloosom">
        <div class="container mx-auto py-14">
            <div
                class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:items-center lg:gap-10 lg:justify-center m-6 lg:m-0">
                @include('components.public.partials.content-card', ['srcImg' => 'icon_reseller_1.png'])
                @include('components.public.partials.content-card', ['srcImg' => 'icon_reseller_2.png'])
                @include('components.public.partials.content-card', ['srcImg' => 'icon_reseller_3.png'])
            </div>
        </div>
    </div>

    <div class="container mx-auto py-14 ">
        @include('components.public.partials.title', [
            'title' => 'Cerita Varian Habbie',
            'align' => 'center',
            'color' => 'grey',
        ])
        <div>
            @php
                $contents = [
                    [
                        'title' => 'Tea Tree',
                        'image' => 'storage/img/img-slide.jpg',
                        'subtitle' => 'Australia',
                        'description' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, natus!
                                    Distinctio
                                    debitis magnam adipisci. ",
                    ],
                    [
                        'title' => 'Tea Tree',
                        'image' => 'storage/img/img-slide.jpg',
                        'subtitle' => 'Australia',
                        'description' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, natus!
                                    Distinctio
                                    debitis magnam adipisci. ",
                    ],
                ];
            @endphp
            @include('components.public.partials.content-slider-about', ['contents' => $contents]);
        </div>
        
    </div>
@endsection
