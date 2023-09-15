@extends('layouts.base-email-layout')
@section('title', 'Order Information')
@section('content')


    @php
        $orders = [
            [
                'name' => 'Flower Anggrek Bulan',
                'image' => 'storage/img/products/flower-series-01.png',
                'price' => 55500,
                'qty' => 1,
                'discount' => 48840,
                'category' => 'Aromatic Telon Oil Flower Series',
            ],
            [
                'name' => 'Flower Anggrek Bulan',
                'image' => 'storage/img/products/flower-series-01.png',
                'price' => 55500,
                'qty' => 1,
                'category' => 'Aromatic Telon Oil Flower Series',
            ],
        ];
        
        $status = 'done'; // 'process', 'cancel', 'failed', 'done', 'order'
        
    @endphp

    @include('components.mail.partials.title', [
        'title' =>
            $status === 'failed' || $status === 'cancel'
                ? 'Maaf Order Anda Gagal Kami Proses'
                : 'Terima Kasih, Order sudah kami terima',
        'align' => 'left',
        'color' => $status === 'failed' || $status === 'cancel' ? 'danger' : 'green',
    ])

    <div class="py-4">
        <h3 class="font-bold text-xl">Order #321</h3>


        <p class="text-sm">
            {{ $status === 'failed' || $status === 'cancel' ? 'Mohon maaf order Anda gagal untuk kami proses. Silahkan hubungi kami untuk informasinya' : 'Order Anda telah kami terima, saat ini sedang kami lakukan proses.' }}
            </br> Berikut untuk detail
            Order Anda:</p>

        <div class="flex flex-col my-4">
            @foreach ($orders as $item)
                <div class="grid grid-cols-4 items-center p-4 {{ $status === 'failed' || $status === 'cancel' ?  'bg-danger' : 'bg-green'  }} bg-opacity-5 my-2">
                    <div>
                        <img class="h-14 mx-auto" src="{{ url($item['image']) }}" alt="{{ $item['name'] }}">
                    </div>
                    <div class="col-span-3 flex flex-col">
                        <a href="#" class="font-bold text-sm hover:text-pink-primary">{{ $item['name'] }}</a>
                        <span class="flex gap-2">
                            @if (isset($item['discount']))
                                <s class="text-xs text-grey">
                                    {{ \App\Helpers\CurrencyFormat::data($item['price']) }}
                                </s>
                            @endif
                            <p class="text-xs font-bold text-grey">
                                {{ isset($item['discount']) ? \App\Helpers\CurrencyFormat::data($item['discount']) : \App\Helpers\CurrencyFormat::data($item['price']) }}
                            </p>
                            <p class="text-xs">{{ ' x ' . $item['qty'] }}</p>
                        </span>
                    </div>
                </div>
            @endforeach
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td>{{ \App\Helpers\CurrencyFormat::data(100000) }}</td>
                </tr>
                <tr>
                    <td>
                        <p>Pengiriman</p>
                        <span class="text-xs text-grey">
                            <p>SICEPAT SIUNTUNG</p>
                            <p>2 - 3 hari</p>
                        </span>
                    </td>
                    <td>{{ \App\Helpers\CurrencyFormat::data(100000) }}</td>

                </tr>
                <tr class="text-white {{ $status === 'failed' || $status === 'cancel' ? 'bg-danger' : 'bg-green' }}">
                    <td>Total</td>
                    <td class="font-bold">{{ \App\Helpers\CurrencyFormat::data(100000) }}</td>
                </tr>
            </table>
        </div>

    </div>


    <div class="py-4">
        <h3 class="font-bold">Informasi Pemesan</h3>
        <table class="table">
            <tr>
                <td>Nama</td>
                <td>Bagus Gandhi Pratama</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>bagusgandhi4@gmail.com</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>088232329820</td>
            </tr>
            <tr>
                <td>Alamat Pengiriman</td>
                <td>Karanggayam RT 07, Bantul, Bantul, Yogyakarta 55711</td>
            </tr>
            <tr>
                <td>Note</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>{{ $status === 'failed' || $status === 'cancel' ? '-' : 'Transfer BCA VA' }}</td>
            </tr>
        </table>
    </div>

@endsection
