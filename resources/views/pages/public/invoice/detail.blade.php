@extends('layouts.base-layout')

@section('title', 'Invoice #' . $invoices->invoice)

@section('content')
    <div class="container mx-auto lg:pt-8 lg:w-1/2">

        <div class="flex flex-row items-center justify-between mx-auto p-6 bg-pink-primary text-white">
            <div class="w-1/2">
                <h3 class="font-bold text-2xl">Invoice</h3>
                <p class="text-xl">#{{ $invoices->invoice }}</p>
            </div>
        </div>

        <div class="p-6 flex flex-col space-y-4 lg:flex-row lg:justify-between lg:items-center">
            <div>
                <p class="text-2xl font-bold">{{ $invoices->name }}</p>
                <span class="flex gap-2 items-center">
                    <p class="text-sm">{{ $invoices->email }}</p>
                    <p class="text-sm">{{ $invoices->phone }}</p>
                </span>
                <p class="text-sm">{{ $invoices->address }}</p>
            </div>
            <div class="bg-grey-secondary-50">
                <span class="rounded lg:text-center">
                    @if ($invoices->status_payment==='paid')
                        <p class="p-4 text-green font-bold">{{$invoices->status_order}} / {{$invoices->status_payment}} </br>@ {{ $latest_payment->created_at }}</p>
                    @else
                        <p class="p-4 text-danger font-bold">{{$invoices->status_order}} / {{$invoices->status_payment}} ({{$latest_payment->transaction_status}})</p>
                    @endif
                </span>
            </div>
        </div>

        <div class="pb-8">
            @if ($invoices->resi)
                <pre class="text-center py-4 text-pink-primary ">No Resi: {{ $invoices->resi }}</pre>
            @endif

            <table class="min-w-full divide-y divide-gray-200 table">
                <thead>
                    <tr class="lg:bg-grey-secondary-50">
                        <th class="lg:hidden">
                            <p class="font-bold text-sm">Order Deails</p>
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <p class="font-bold text-sm">Order Deails</p>
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <p class="font-bold text-sm text-center">QTY</p>
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <p class="font-bold text-sm text-center">Subtotal</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($orders as $order)
                        <tr>
                            <td class="md:table-cell px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-row items-center">
                                    <div class="w-24 lg:w-14">
                                        <img class="h-24 lg:h-14 mx-auto" src="{{ url($order->product->image) }}"
                                            alt="{{ $order->product->name }}">
                                    </div>
                                    <div class="lg:hidden">
                                        <p class="">{{ $order->product->name }}</p>
                                        <p class="text-grey-secondary">Items: {{ $order->qty }}</p>
                                        <p class="text-pink-primary">
                                            {{ \App\Helpers\CurrencyFormat::data($order->total_price) }}
                                        </p>
                                    </div>
                                    <p class="hidden lg:block">{{ $order->product->name }}</p>

                                </div>
                            </td>
                            <td class="hidden lg:table-cell">
                                <p class="text-center">{{ $order->qty }}</p>
                            </td>
                            <td class="hidden lg:table-cell">
                                <p class="text-center">{{ \App\Helpers\CurrencyFormat::data($order->total_price) }}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <p class="hidden lg:block">Subtotal</p>
                            <span class="flex justify-between items-center lg:hidden">
                                <p class="font-bold text-lg">Subtotal</p>
                                <p class="text-pink-primary text-end font-bold text-lg">
                                    {{ \App\Helpers\CurrencyFormat::data($invoices->sub_total) }}</p>
                            </span>
                        </td>
                        <td class="hidden lg:table-cell"></td>
                        <td class="hidden lg:table-cell">
                            <p class="text-center text-pink-primary">
                                {{ \App\Helpers\CurrencyFormat::data($invoices->sub_total) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="hidden lg:block py-2">Catatan</p>
                            <div class="hidden lg:block text-pink-primary">
                                @php
                                    echo $invoices->note;
                                @endphp
                            </div>
                            <span class="lg:hidden">
                                <p class="font-bold text-lg py-2">Catatan</p>
                                <div class="text-pink-primary">
                                    @php
                                        echo $invoices->note;
                                    @endphp
                                </div>
                            </span>
                        </td>
                    </tr>
                    <tr class="bg-grey-secondary-50">
                        <td class="flex justify-between items-center lg:table-cell">
                            <span>
                                <p class="text-grey-secondary">Pengiriman:</p>
                                <p class="text-lg font-bold">
                                    {{ $invoices->shipping_code . ' ' . $invoices->shipping_service }}</p>
                                Estimasi {{ $invoices->shipping_etd }} Hari
                            </span>
                            <p class="text-center lg:hidden">
                                {{ \App\Helpers\CurrencyFormat::data($invoices->shipping_value) }}</p>

                        </td>
                        <td class="hidden lg:table-cell"></td>
                        <td class="hidden lg:table-cell">
                            <p class="text-center">{{ \App\Helpers\CurrencyFormat::data($invoices->shipping_value) }}</p>
                        </td>
                    </tr>
                    <tr class="{{ $invoices->status_payment==='paid' ? 'bg-green' : 'bg-danger' }}  text-white">
                        <td class="flex justify-between items-center lg:table-cell">
                            <h4 class="text-xl font-bold">Total</h4>
                            <p class="text-center font-bold text-lg lg:hidden">
                                {{ \App\Helpers\CurrencyFormat::data($invoices->total) }}</p>
                        </td>
                        <td class="hidden lg:table-cell"></td>
                        <td class="hidden lg:table-cell">
                            <p class="text-center font-bold text-lg">
                                {{ \App\Helpers\CurrencyFormat::data($invoices->total) }}</p>
                        </td>
                    </tr>

                </tbody>
            </table>

            @if ($invoices->status_payment==='paid')
                <div class="py-4">
                    <h4 class="font-bold px-2 text-green">Detail Payment</h4>
                    <table class="min-w-full divide-y divide-gray-200 table">
                        <tbody>
                            <tr>
                                <td>
                                    <p class="font-bold">{{ $invoices->payment->va_number }}</p>
                                    <p>at {{ $latest_payment->created_at }}</p>
                                </td>
                                <td>
                                    <p class="text-center font-bold">Bank {{ strtoupper($invoices->payment->bank) }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="w-1/2 mx-auto my-8">
            <a href="{{ url('invoice') }}">
                <span class="flex flex-row justify-center items-center gap-2">

                    <p class="text-pink-primary font-bold">Ke List Invoice</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-pink-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </a>
        </div>
    </div>

@endsection
