@extends('layouts.base-layout')

@section('title', 'Membership')
@section('content')

    @php
        $contents = [
            [
                'name' => 'Baru 10 Hari, Udah Order Lagi dan Lagi!!',
                'image' => 'storage/img/testimonial_malina.jpg',
                'profesi' => 'intan',
                'lokasi' => 'Makassar',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, quos itaque, ipsam cum magnam eum officia obcaecati odio ea, veniam corporis quas quia! Doloremque a ut, ex provident vel harum.',
            ],
            [
                'name' => 'Baru 10 Hari, Udah Order Lagi dan Lagi!!',
                'image' => 'storage/img/testimonial_malina.jpg',
                'profesi' => 'intan',
                'lokasi' => 'Makassar',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, quos itaque, ipsam cum magnam eum officia obcaecati odio ea, veniam corporis quas quia! Doloremque a ut, ex provident vel harum.',
            ],
        ];
    @endphp
    <div class="container mx-auto pb-10">
        <img class="w-full object-cover" src="{{ url('storage/img/slide-4.png') }}" alt="Membership Program">
        <div class="pt-14">
            <div class="text-center">
                <h3 class="font-bold text-2xl text-pink-primary">Mitra Habbie</h3>
            </div>
            @include('components.public.partials.testimonial-slider', ['contents' => $contents])
        </div>
    </div>
    <div class="py-10 bg-pink-bloosom">
        <div class="lg:w-1/2 lg:mx-auto mx-6 text-center flex flex-col gap-4">
            <h3 class="font-bold text-2xl text-pink-primary">Mengapa Menjadi Reseller Habbie</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo illum culpa dicta amet, provident aliquid.
                Voluptate veniam nam adipisci, vel sint modi, minus corrupti molestias praesentium cupiditate rem at
                iusto?</br></br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo illum culpa dicta amet,
                provident aliquid. Voluptate veniam nam adipisci, vel sint modi, minus corrupti molestias praesentium
                cupiditate rem at iusto?</p>
            <button class="btn btn-sm btn-primary mx-auto rounded-full font-bold text-white">Term & Condition</button>
        </div>
    </div>
    <div class="grid grid-cols-5 overflow-x-hidden h-64">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonial_dhea.jpeg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonial_nisa.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonial_natia.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonial_malina.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonial_hansel.jpg') }}" alt="">
    </div>
    <div class="container lg:mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-4 my-10 lg:py-10 items-center">
        <div class="flex flex-col gap-4">
            <h3 class="font-bold text-2xl text-pink-primary">Benefit Reseller Habbie</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo illum culpa dicta amet, provident aliquid.Voluptate veniam nam adipisci, vel sint modi, minus corrupti molestias praesentium cupiditate rem at iusto?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo illum culpa dicta amet, provident aliquid.
            </p>
        </div>
        <div>
            <img class="w-full lg:w-full lg:object-cover lg:h-80" src="{{ url('storage/img/testimonial_dhea.jpeg') }}" alt="">
        </div>
    </div>
    <div class="container mx-auto lg:bg-grey-secondary-50 p-10 rounded-lg my-10 text-center flex flex-col gap-4">
        <h3 class="font-bold text-2xl text-grey">Tunggu Apa Lagi, Mombie?</h3>
        <button class=" btn btn-sm btn-primary mx-auto rounded-full font-bold text-white">Join Member Now!</button>
    </div>

@endsection
