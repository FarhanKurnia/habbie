@extends('layouts.base-email-layout')
{{-- @section('title', 'Special Offers') --}}
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
    
    <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 24px">Special Offer</h3>
    </div>

    <div>
        <div style="padding-top: 4px; padding-bottom: 4px;">
            <p style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000"><strong>Hai
                    Mom Bie</strong><br />
                Khusus untuk kamu, saat ini Habbie memiliki <b><i>Special Offers: {{ $offer['name'] }}</i></b> yang sayang banget untuk kamu
                lewatkan
                loh!
            </p>
        </div>
        <div style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000">
            {{-- <img style="width: 100%" src="{{ url($offer['image']) }}" alt="{{ $offer['name'] }}"> --}}
            {{-- <h3 style="text-align: center;">{{ $offer['name'] }}</h3>
            <p>{!! $offer['description'] !!}</p> --}}

            <div style="width:100%; text-align: center;">
                <a href="{{ url('/products/' . $offer->product->slug) }}" target="_blank">
                    <button class="cta-button">
                        Lihat Produk
                    </button>
                </a>
            </div>

            <p>
                Tunggu apa lagi! Kunjungi Habbie Store sekarang dan temukan penawaran menarik lain yang kami siapkan hanya
                untuk
                kamu.
                <a href="{{ url('offers') }}" target="_blank" class="text-pink-primary italic underline font-bold">List
                    Spesial
                    Offers</a>
            </p>
            <small style="color:dimgray">
                Klik <i><a href=" {{ url('/unsubscribe') }}">link</a></i> berikut ntuk berhenti berlangganan email penawaran
                Habbie
            </small>
        </div>
    </div>


@endsection
