@extends('layouts.base-email-layout')
{{-- @section('title', 'Invoice Order') --}}
@section('content')

    <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 18px">Invoice Order #{{ $orderData['invoice'] }}</h3>
    </div>

    <div>
        <div style="padding-top: 4px; padding-bottom: 4px;">
            <p style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000"> Terima kasih
                sudah melakukan pemesanan. Berikut adalah informasi pesanan dengan nomor invoice
                <strong>#{{ $orderData['invoice'] }}</strong>. Untuk selanjutnya, silahkan dapat melakukan pembayaran sesuai
                dengan
                metode pembayaran yang telah dipilih.
            </p>
        </div>

        {{-- separator --}}
        <p
            style="border-top:solid 2px #d2d1d1;font-size:1;margin:0px auto;width:100%;padding-top: 10px;padding-bottom: 10px;">
        </p>

        <table class="table" style="width: 100%;">
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Nama</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['name'] }}</td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Email</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['email'] }}</td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Phone</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['phone'] }}</td>

            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Alamat</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['address'] }}, {{ $orderData['customer']['subdistrict'] }},
                    {{ $orderData['customer']['city'] }}, {{ $orderData['customer']['province'] }},
                    {{ $orderData['customer']['postal_code'] }}</td>

            </tr>
        </table>
        <br>
        <br>
        <table class="table list" style="width: 100%;">
            <thead style="background-color: #fae6e5;">
                <tr>
                    <th style="padding: 8px;">Order Detail</th>
                    <th>QTY</th>
                    <th>Item Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderData['products'] as $item)
                    <tr>
                        <td style="padding:8px; display: flex; justify-content: center; align-items: center;">
                            <a>{{ $item['name'] }}</a>
                        </td>
                        <td style="padding:8px;">
                            <p>{{ $item['quantity'] }}</p>
                        </td>
                        <td style="padding:8px;">
                            @php
                                $price = isset($item['discount_id']) ? $item['sub_total_price'] : $item['price'];
                            @endphp
                            <p>{{ \App\Helpers\CurrencyFormat::data($price) }}</p>
                        </td>
                        <td style="padding:8px;">
                            <p>{{ \App\Helpers\CurrencyFormat::data($item['total_price']) }}</p>
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
                    <td style="padding:8px;">
                        <p>Biaya Ongkir</p>
                    </td>
                    <td style="padding:8px;">
                        <p>{{ \App\Helpers\CurrencyFormat::data($orderData['shipping']['value']) }}</p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding:8px;">
                        <p>Total</p>
                    </td>
                    <td style="padding:8px; color:#de596d;">
                        <p>{{ \App\Helpers\CurrencyFormat::data($orderData['subtotal'] + $orderData['shipping']['value']) }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Catatan<br>
            {!! $orderData['customer']['note'] !!}
        </p>
        <br>
        <br>
        <div>
            Salam hangat,<br>
            Admin Habbie
        </div>
    </div>
@endsection
