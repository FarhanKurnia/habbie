@extends('layouts.base-email-layout')
@section('title', 'Invoice Order')
@section('content')

    {{-- <div class="relative">
        <div class="absolute py-2 px-4 right-0 text-white rounded bg-green">
            Paid
        </div>
    </div> --}}
    @include('components.mail.partials.title', [
        'title' => 'Invoice Order #' . $orderData['invoice'],
        'align' => 'left',
        'color' => 'grey',
    ])

    <div class="py-4 text-sm">
        <div class="py-4">
            <p>Terima Kasih sudah melakukan Order di Habbie, berikut untuk informasi invoice order #{{$orderData['invoice']}} </p>
        </div>


        <table class="table">
            <tr>
                <td>Nama</td>
                <td>{{ $orderData['customer']['name'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $orderData['customer']['email'] }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $orderData['customer']['phone'] }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{$orderData['customer']['address']}}, {{$orderData['customer']['subdistrict']}}, {{$orderData['customer']['city']}}, {{$orderData['customer']['province']}}, {{$orderData['customer']['postal_code']}}</td>
            </tr>
            {{-- <tr>
                <td>Catatan</td>
                <td>{!! $orderData['customer']['note']!!}</td>
            </tr> --}}
        </table>
        <br>
        <br>
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
                @foreach ($orderData['products'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            @php
                                $price = isset($item['discount_id']) ? $item['sub_total_price'] : $item['price'];
                            @endphp
                            {{ \App\Helpers\CurrencyFormat::data($price) }}
                        </td>
                        <td>
                            {{ \App\Helpers\CurrencyFormat::data($item['total_price'] ) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Biaya Ongkir</td>
                    <td>
                        {{ \App\Helpers\CurrencyFormat::data($orderData['shipping']['value']) }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td class="font-bold text-pink-primary text-lg">
                        {{ \App\Helpers\CurrencyFormat::data($orderData['subtotal']+$orderData['shipping']['value']) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Catatan<br>
            {!! $orderData['customer']['note']!!}
        </p>
        <br>
        <br>
        <div class="py-4">
            Salam hangat,<br>
            Admin Habbie
        </div>
    </div>
@endsection
