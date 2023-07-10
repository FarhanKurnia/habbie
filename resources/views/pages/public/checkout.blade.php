@extends('layouts.base-layout')

@section('title', 'Checkout Orders')

@section('content')
    <div class="container mx-auto px-6 lg:px-0">
        <div class="flex flex-row gap-8">
            <div class="w-2/3">
                <livewire:form-check-ongkir />
            </div>
            <div class="p-4 bg-grey-secondary-50 w-1/3">
                @php
                    $cartItems = \Cart::getContent();
                @endphp
                <ul class="pt-4">
                    @foreach ($cartItems as $item)
                        <li class="my-6">
                            <a href="{{ url('products/' . $item['attributes']->slug) }}">
                                <div class="flex bg-white rounded-xl p-4 items-center">
                                    <div class="w-1/3">
                                        <img class="h-20 mx-auto" src="{{ url($item['attributes']->image) }}"
                                            alt="{{ $item['name'] }}">
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xl">{{ $item['name'] }}</h4>
                                        <p class="text-sm text-grey-secondary">
                                            {{ \App\Helpers\CurrencyFormat::data($item['price']) . ' X ' . $item['quantity'] }}</p>
                                        <p class="font-bold">{{ \App\Helpers\CurrencyFormat::data($item['price'] * $item['quantity']) }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ url('/cart') }}" class="underline text-primary">Edit Kerajanang</a>
                <livewire:info-total />
            </div>
        </div>
    </div>
@endsection
