@extends('layouts.base-email-layout')
@section('title', 'Special Offers')
@section('content')

    @php
        $user = [
            'name' => 'Bagus Gandhi',
        ];
        
        $offer = [
            'name' => 'Buy 3 get 1 free',
            'image' => 'storage/img/offers/sample-offers-01.png',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ipsum commodo, consequat.',
            'product' => 'tea-green-honey',
        ];
        
    @endphp

    @include('components.mail.partials.title', [
        'title' => 'Special Offers',
        'align' => 'left',
        'color' => 'grey',
    ])

    <div class="py-4 text-sm">
        <p>Dear <b>{{ $user['name'] }}</b>,</p>
        <p>Kami dengan senang hati ingin memberi tahu Anda tentang <b><i>Special Offers</i></b> dari Habbie yang tidak boleh
            Anda lewatkan!</p>

        <div class="flex-col space-y-2 items-center my-4 gap-4 p-4 bg-grey-secondary-50">
            <div>
                <img class="w-full mx-auto" src="{{ url($offer['image']) }}" alt="{{ $offer['name'] }}">
            </div>
            <h3 class="font-bold text-pink-primary text-lg">{{ $offer['name'] }}</h3>
            <p>{{ $offer['description'] }}</p>
            <a href="{{ url('/products/'.$offer['product']) }}" target="_blank">
                <button class="btn btn-sm btn-primary rounded-full font-bold my-2 text-white text-xs">Lihat Produk</button>
            </a>
        </div>

        <p>Jangan lewatkan kesempatan ini! Kunjungi Habbie Store sekarang dan temukan penawaran hebat yang telah kami
            siapkan khusus untuk Anda. <a href="{{ url('offers') }}" target="_blank" class="text-pink-primary italic underline font-bold">List Spesial Offers</a></p>

    </div>


@endsection
