@extends('layouts.base-email-layout')
@section('title', 'Order Information')
@section('content')


    @php
        $status = 'done'; // 'process', 'cancel', 'failed', 'done', 'order'  
    @endphp

    @include('components.mail.partials.title', [
        'title' =>
            $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel'
                ? 'Maaf Order Anda Gagal Kami Proses'
                : 'Terima Kasih, Order sudah kami terima',
        'align' => 'left',
        'color' => $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'danger' : 'green',
    ])

    <div class="py-4">
        <h3 class="font-bold text-xl">Order #{{$order[0]['invoice']}}</h3>


        <p class="text-sm">
            {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'Mohon maaf order Anda gagal untuk kami proses. Silahkan hubungi kami untuk informasinya' : 'Order Anda telah kami terima, saat ini sedang kami lakukan proses dan selanjutnya akan dikirim sesuai estimasi pengiriman.' }}
            </br> Berikut untuk detail order Anda:</p>

        <div class="flex flex-col my-4">
            @foreach ($order[0]->orderproduct as $item)
                <div class="grid grid-cols-4 items-center p-4 {{ $status_order === 'failed' || $status_order === 'cancel' ?  'bg-danger' : 'bg-green'  }} bg-opacity-5 my-2">
                    <div>
                        <img class="h-14 mx-auto" src="{{ url($item->product->image) }}" alt="{{ $item->product->name }}">
                    </div>
                    <div class="col-span-3 flex flex-col">
                        <a href="#" class="font-bold text-sm hover:text-pink-primary">{{ $item->product->name }}</a>
                        <span class="flex gap-2">
                            @if (isset($item['discount_id']))
                                <s class="text-xs text-grey">
                                    {{ \App\Helpers\CurrencyFormat::data($item['total_price']+$item['discount_price']) }}
                                </s>
                            @endif
                            <p class="text-xs font-bold text-grey">
                                {{\App\Helpers\CurrencyFormat::data($item['total_price']) }}
                            </p>
                            <p class="text-xs">{{ ' x ' . $item['qty'] }}</p>
                        </span>
                    </div>
                </div>
            @endforeach
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['total']) }}</td>
                </tr>
                <tr>
                    <td>
                        <p>Pengiriman</p>
                        <span class="text-xs text-grey">
                            <p>{{$order[0]['shipping_code']}} {{$order[0]['shipping_service']}}</p>
                            <p>{{$order[0]['shipping_etd']}} hari</p>
                        </span>
                    </td>
                    <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['shipping_value']) }}</td>

                </tr>
                <tr class="text-white {{ $status === 'failed' || $status === 'cancel' ? 'bg-danger' : 'bg-green' }}">
                    <td>Total</td>
                    <td class="font-bold">{{ \App\Helpers\CurrencyFormat::data($order[0]['total']+$order[0]['shipping_value']) }}</td>
                </tr>
            </table>
        </div>

    </div>


    <div class="py-4">
        <h3 class="font-bold">Informasi Pemesan</h3>
        <table class="table">
            <tr>
                <td>Nama</td>
                <td>{{$order[0]['name']}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$order[0]['email']}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$order[0]['phone']}}</td>
            </tr>
            <tr>
                <td>Alamat Pengiriman</td>
                <td>{{$order[0]['address']}}, {{$order[0]['subdistrict']}}, {{$order[0]['city']}}, {{$order[0]['province']}}, {{$order[0]['postal_code']}}</td>
            </tr>
            <tr>
                <td>Note</td>
                <td>{!! $order[0]['note'] !!}</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>{{ $order[0]->payment->bank }}</td>
            </tr>
        </table>
    </div>

@endsection
