@extends('layouts.base-email-layout')
@section('title', 'Order Information')
@section('content')

<div style="width:100%; text-align: center;">
    <h3 style="font-weight: bold; font-size: 20px">
        {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel'
            ? 'Maaf Order Anda Gagal Kami Proses'
            : 'Terima Kasih, Order sudah kami terima' }}
    </h3>
</div>

<div>
    <div style="padding-top: 4px; padding-bottom: 4px;">

        <h3 style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000">Order
            #{{ $order[0]['invoice'] }}</h3>

        <p>
            {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'Mohon maaf order Anda gagal untuk kami proses. Silahkan hubungi kami untuk informasinya' : 'Order Anda telah kami terima, saat ini sedang kami lakukan proses dan selanjutnya akan dikirim sesuai estimasi pengiriman.' }}<br></br>
            Berikut untuk detail order Anda:
        </p>
    </div>

    <div>
        <div>
            <table style="width: 100%;">
                @foreach ($order[0]->orderproduct as $item)
                    <tr>
                        <td style="width:25%;text-align:center;">
                            <img src="{{ url($item->product->image) }}" style="height: 80px;padding: 8px;">
                        </td>
                        <td>
                            <div>
                                <a href=""
                                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#de586c;font-weight: bold">
                                    {{ $item->product->name }}
                                </a><br></br>
                                <span>
                                    @if (isset($item['discount_id']))
                                        <s>
                                            {{ \App\Helpers\CurrencyFormat::data($item['total_price'] + $item['discount_price']) }}
                                        </s>
                                    @endif

                                    {{ \App\Helpers\CurrencyFormat::data($item['total_price']) }}
                                </span><br></br>
                                <small>{{ ' x ' . $item['qty'] }}</small>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

        <table class="table" style="width: 100%;">
            <tr>
                <td style="width:25%;">
                    <p>Subtotal</p>
                </td>
                <td>
                    {{ \App\Helpers\CurrencyFormat::data($order[0]['total']) }}
                </td>
            </tr>
            <tr>
                <td>
                    Pengiriman<br></br>
                    <small>
                        {{ $order[0]['shipping_code'] }} {{ $order[0]['shipping_service'] }}
                    </small><br></br>
                    <small>{{ $order[0]['shipping_etd'] }} hari</small>
                </td>
                <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['shipping_value']) }}</td>
            </tr>
            <tr>
                <td>
                    <p>Total</p>
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#de586c;font-weight: bold">
                    {{ \App\Helpers\CurrencyFormat::data($order[0]['total'] + $order[0]['shipping_value']) }}
                </td>
            </tr>
        </table>

    </div>

    <div>
        <h3>Informasi Pemesan</h3>
        <table class="table" style="width: 100%;">

            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Nama
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {{ $order[0]['name'] }}
                </td>
            </tr>

            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Email
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {{ $order[0]['email'] }}
                </td>
            </tr>

            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Phone
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {{ $order[0]['phone'] }}
                </td>
            </tr>

            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Alamat Pengiriman
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {{$order[0]['address']}}, {{$order[0]['subdistrict']}}, {{$order[0]['city']}}, {{$order[0]['province']}}, {{$order[0]['postal_code']}}
                </td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Note</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {!! $order[0]['note'] !!}
                </td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Pembayaran
                </td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    {{ $order[0]->payment->bank }}
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection
