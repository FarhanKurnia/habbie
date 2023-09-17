@extends('layouts.base-email-layout')
@section('title', 'Invoice Order')
@section('content')

    @php
        $order = [
            'invoice' => '321',
            'customer_detail' => [
                'name' => 'Bagus Gandhi',
                'email' => 'bagusgandhi4@gmail.com',
                'phone' => '08823232822',
                'address' => 'Karanggayam RT 07, Bantul, Bantul, Yogyakarta 55711',
            ],
            'shipping_detail' => [
                'value' => 7000,
                'service' => 'SICEPAT SIUNTUNG',
                'etd' => '2 - 3',
            ],
            'order_detail' => [
                [
                    'name' => 'Flower Anggrek Bulan',
                    'image' => 'storage/img/products/flower-series-01.png',
                    'price' => 55500,
                    'qty' => 1,
                    'discount' => 48840,
                ],
                [
                    'name' => 'Flower Anggrek Bulan',
                    'image' => 'storage/img/products/flower-series-01.png',
                    'price' => 55500,
                    'qty' => 1,
                ],
            ],
            'total' => 100000,
        ];
        
        $status = 'done'; // 'process', 'cancel', 'failed', 'done', 'order'
        
    @endphp

    <div class="relative">
        <div class="absolute py-2 px-4 right-0 text-white rounded bg-green">
            Paid
        </div>
    </div>
    @include('components.mail.partials.title', [
        'title' => 'Invoice Order #' . $order['invoice'],
        'align' => 'left',
        'color' => 'grey',
    ])

    <div class="py-4 text-sm">
        <div class="py-4">
            <p>Terima Kasih sudah melakukan Order di Habbie, berikut untuk informasi invoice order #321 </p>
        </div>


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
                <td>Shipping</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>{{ $status === 'failed' || $status === 'cancel' ? '-' : 'Transfer BCA VA' }}</td>
            </tr>
        </table>

        <table class="table table-zebra bg-opacity-40 my-4">
            <thead>
                <tr>
                    <th>Order Detail</th>
                    <th>QTY</th>
                    <th>Item Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order['order_detail'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>
                            @php
                                $price = isset($item['discount']) ? $item['discount'] : $item['price'];
                            
                            @endphp
                            {{ \App\Helpers\CurrencyFormat::data($price) }}
                        </td>
                        <td>
                            {{ \App\Helpers\CurrencyFormat::data($price * $item['qty'] ) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Subtotal</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Biaya Ongkir</td>
                    <td>
                        {{ \App\Helpers\CurrencyFormat::data($order['shipping_detail']['value']) }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td class="font-bold text-pink-primary text-lg">
                        {{ \App\Helpers\CurrencyFormat::data($order['total']) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <p>Note</p>
        <p>-</p>

    </div>
@endsection
