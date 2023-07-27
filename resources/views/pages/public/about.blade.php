@extends('layouts.base-layout')

@section('title', 'About us')
@section('content')
    @include('components.public.partials.hero-slider')

    <div class="container mx-auto py-14">
        @include('components.public.partials.title', ['title' => 'Apa itu Minyak Telon?', 'align' => 'center', 'color' => 'pink-primary'])
        <div class="mx-6 lg:w-1/2 lg:mx-auto">
            <img class="pb-6" src="{{ asset('storage/img/img-slide.jpg') }}" alt="minyak telon habbie">
            <p class="text-left">
                Dimulai tahun 2019, sebuah perusahaan yang berfokus pada produk berbasis Aromatic by Nature.
                Kompetensi inti kami adalah budaya dan teknologi yang kuat berbasis online.
                Dengan semangat kami sebagai generasi milenial, kami menyediakan produk dan brand unik yang memiliki nilai tambah bagi masyarakat. 
                Love, Passion, Innovation, Customer Satisfaction, dan Family, adalah lima pilar nilai inti perusahaan kami.
                Tagline kami adalah "Delivering love, passion, and kindness."</p>
        </div>
    </div>

    <div class="bg-pink-bloosom">
        <div class="container mx-auto py-14">
            <div
                class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:items-center lg:gap-10 lg:justify-center m-6 lg:m-0">
                @include('components.public.partials.content-card', [ 'srcImg' => 'icon_reseller_1.png'])
                @include('components.public.partials.content-card', [ 'srcImg' => 'icon_reseller_2.png'])
                @include('components.public.partials.content-card', [ 'srcImg' => 'icon_reseller_3.png'])
            </div>
        </div>
    </div>

    <div class="container mx-auto py-14 ">
        @include('components.public.partials.title', ['title' => 'Cerita Varian Habbie', 'align' => 'center', 'color' => 'grey'])
        {{-- <div>
            @php
                $content = [

                ];
            @endphp
            @include('components.public.partials.content-slider', ['products' => $content ]);
        </div> --}}
        <div class="flex relative">
            <div class="carousel py-14 relative">
                <div id="content1" class="carousel-item w-full">
                    <div class="relative py-10">
                        <div class="absolute -z-10 top-0 left-1/3 ml-32 bg-teal-shadow rounded-3xl" style="width: 580px; height:450px;"></div>
                        <div class="w-2/3 mx-auto content-slider lg:grid lg:grid-cols-2 lg:gap-10 items-center">
                            <div class="image-content pb-4">
                                <img src="{{ asset('storage/img/img-slide.jpg') }}" />
                            </div>
                            <div class="text-content w-2/3">
                                <h3 class="text-2xl font-bold text-grey">Tea Tree</h3>
                                <p class="text-gray-400 text-sm text-grey">AUSTRALIA</p>
                                <br />
                                <div class="border-b-4 border-green"></div>
                                <br />

                                <p class="pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, natus!
                                    Distinctio
                                    debitis magnam adipisci.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content2" class="carousel-item w-full">
                    <div class="w-2/3 mx-auto content-slider lg:grid lg:grid-cols-2 lg:gap-10 items-center">
                        <div class="image-content pb-4">
                            <img src="{{ asset('storage/img/img-slide.jpg') }}" />
                        </div>
                        <div class="text-content">
                            <p class="text-gray-400 text-sm text-grey">RECOMMENDATION FOR YOU</p>
                            <h3 class="text-2xl font-bold text-pink-primary">Aromatic Telon Oil Variant Rose</h3>
                            <p class="pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, natus!
                                Distinctio
                                debitis magnam adipisci.</p>
                            <button class="btn btn-primary rounded-full font-bold text-white">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-1/2 lg:ml-10">
                <a href="#content1" class="text-gray-500 text-3xl">❮</a>
            </div>
            <div class="absolute bottom-1/2 right-0 lg:mr-10">
                <a href="#content2" class="text-gray-500 text-3xl">❯</a>
            </div>
        </div>
    </div>
@endsection
