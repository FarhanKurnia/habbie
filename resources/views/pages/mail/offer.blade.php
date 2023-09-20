@extends('layouts.base-email-layout')
@section('title', 'Special Offers')
@section('content')

    @php
        $user = [
            'name' => 'Bagus Gandhi',
        ];
        
        // $offer = [
        //     'name' => 'Buy 3 get 1 free',
        //     'image' => 'storage/img/offers/sample-offers-01.png',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ipsum commodo, consequat.',
        //     'product' => 'tea-green-honey',
        // ];
        
    @endphp

    @include('components.mail.partials.title', [
        'title' => 'Special Offers',
        'align' => 'left',
        'color' => 'grey',
    ])

    <div class="py-4 text-sm">
        <p><b>Hai Mom Bie</b>,</p>
        <p>Khusus untuk kamu, saat ini Habbie memiliki <b><i>Special Offers</i></b> yang sayang banget untuk kamu lewatkan loh!</p>

        <div class="flex-col space-y-2 items-center my-4 gap-4 p-4 bg-grey-secondary-50">
            <div>
                <img class="w-full mx-auto" src="{{ url($offer['image']) }}" alt="{{ $offer['name'] }}">
            </div>
            <h3 class="font-bold text-pink-primary text-lg">{{ $offer['name'] }}</h3>
            <p>{!! $offer['description'] !!}</p>
            <a href="{{ url('/products/'.$offer->product->slug)}}" target="_blank">
                <button class="btn btn-sm btn-primary rounded-full font-bold my-2 text-white text-xs">Lihat Produk</button>
            </a>
        </div>

        <p>
            Tunggu apa lagi! Kunjungi Habbie Store sekarang dan temukan penawaran menarik lain yang kami siapkan hanya untuk kamu. 
            <a href="{{ url('offers') }}" target="_blank" class="text-pink-primary italic underline font-bold">List Spesial Offers</a>
        </p>

    </div>


@endsection
