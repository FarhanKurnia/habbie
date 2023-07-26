@extends('layouts.base-layout')

@section('title', 'Checkout Orders')

@section('content')
    <div class="container mx-auto lg:w-1/3 px-6 lg:px-0">
        <div class="my-14">
            <div class="bg-grey-secondary-50">

                <h3 class="font-bold text-xl p-4">Order Details</h3>
                <ul>
                    @foreach ($orderProducts as $item)
                        <li class="my-1">
                            <div class="flex bg-white p-4 items-center">
                                <div class="w-1/3">
                                    <img class="h-20 mx-auto" src="{{ url($item['product']['image']) }}"
                                        alt="{{ $item['product']['name'] }}">
                                </div>
                                <div>
                                    <h4 class="font-bold text-xl">{{ $item['product']['name'] }}</h4>
                                    @if ($item['discount_id'])
                                        <s class="text-xs text-pink-primary">
                                            {{ \App\Helpers\CurrencyFormat::data($item['price']) }}
                                        </s>
                                    @endif
                                    <p class="text-sm text-grey-secondary">
                                        {{ \App\Helpers\CurrencyFormat::data($item['price'] - $item['discount_price']) . ' X ' . $item['qty'] }}
                                    </p>
                                    <p class="font-bold">
                                        {{ \App\Helpers\CurrencyFormat::data($item['sub_total_price'] * $item['qty'] ) }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="my-8 p-4 flex flex-col space-y-4">
                    <span class="flex justify-between">
                        <p>Subtotal Produk</p>
                        <p>{{ \App\Helpers\CurrencyFormat::data($order['sub_total']) }}</p>
                    </span>
                    <span class="flex justify-between items-center">
                        <span>
                            <p>Biaya Ongkir</p>
                            <p class="text-sm text-grey-secondary">
                                {{ $order['shipping_code'] . ' ' . $order['shipping_service'] }}</p>
                            <p class="text-sm text-grey-secondary">Estimasi Pengiriman {{ $order['shipping_etd'] }} Hari</p>
                        </span>
                        <p class="">{{ \App\Helpers\CurrencyFormat::data($order['shipping_value']) }}</p>
                    </span>
                    <span class="flex justify-between">
                        <p>Total</p>
                        <p class="font-bold text-xl text-pink-primary">
                            {{ \App\Helpers\CurrencyFormat::data($order['total']) }}</p>
                    </span>
                </div>
            </div>
            <button id="pay-button" type="" class="btn btn-primary text-white rounded-full">Lanjut
                Pembayaran</button>
        </div>

    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('service.midtrans.clientKey') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');

        payButton.addEventListener('click', function(e) {
            e.preventDefault();


            snap.pay('{{ $snapToken }}', {

                onSuccess: function(result) {
                    // document.cookie = '{{ $invoice }}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                    // window.location.replace('http://localhost:8000/invoice/' + {{ $invoice }});
                    // console.log({{ $invoice }});
                    // window.location.replace('http://localhost:8000/cart');
                    window.location.replace('{{ url("invoice/".$invoice) }}');
                },

                onPending: function(result) {
                    console.log(invoice, result);
                },

                onError: function(result) {
                    // document.cookie = '{{ $invoice }}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                    // window.location.replace('http://localhost:8000/cart');
                    window.location.replace('{{ url("invoice/".$invoice) }}');
                }
            });
        });
    </script>
@endsection
