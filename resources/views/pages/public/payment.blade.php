@extends('layouts.base-layout')

@section('title', 'Checkout Orders')

@section('content')
    <div class="container mx-auto w-1/3 px-6 lg:px-0">
        <div class="my-14">
            <div class="bg-grey-secondary-50">
                @php
                    $cartItems = \Cart::getContent();
                @endphp
                <h3 class="font-bold text-xl p-4">Order Details</h3>
                <ul>
                    @foreach ($cartItems as $item)
                        <li class="my-1">
                            <a href="{{ url('products/' . $item['attributes']->slug) }}">
                                <div class="flex bg-white p-4 items-center">
                                    <div class="w-1/3">
                                        <img class="h-20 mx-auto" src="{{ url($item['attributes']->image) }}"
                                            alt="{{ $item['name'] }}">
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xl">{{ $item['name'] }}</h4>
                                        <p class="text-sm text-grey-secondary">
                                            {{ \App\Helpers\CurrencyFormat::data($item['price']) . ' X ' . $item['quantity'] }}
                                        </p>
                                        <p class="font-bold">
                                            {{ \App\Helpers\CurrencyFormat::data($item['price'] * $item['quantity']) }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="my-8 p-4 flex flex-col space-y-4">
                    <span class="flex justify-between">
                        <p>Subtotal</p>
                        <p class="font-bold">{{ \App\Helpers\CurrencyFormat::data(Cart::getTotal()) }}</p>
                    </span>
                </div>
            </div>
            <button id="pay-button" type="" class="btn btn-primary text-white rounded-full">Lenjut Pembayaran</button>
        </div>

    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('service.midtrans.clientKey') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
@endsection
