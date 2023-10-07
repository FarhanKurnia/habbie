@extends('layouts.base-layout')

@section('title', 'Invoice')

@section('content')
    <div class="container mx-auto py-14 px-6 lg:px-0">
        @include('components.public.partials.title', [
            'title' => 'List Invoice',
            'align' => 'left',
            'color' => 'pink-primary',
        ])

        <table class="min-w-full divide-y divide-gray-200 table">
            <thead>
                <tr class="lg:bg-grey-secondary-50">
                    <th class="lg:hidden"></th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">invoice</p>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">Status Order</p>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">Shipping</p>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">Total</p>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">Status Payment</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        {{-- Mobile display --}}
                        <td class="lg:hidden pb-8">
                            <a href="{{ url('invoice/' . $invoice->invoice) }}">
                                <div class="flex flex-col">
                                    <span
                                        class="bg-pink-bloosom bg-opacity-40 flex flex-row justify-between items-center p-2 rounded">
                                        {{-- @php
                                            $status;
                                            if ($invoice->status === 'process') {
                                                $status = 'text-green';
                                            } elseif ($invoice->status === 'failed') {
                                                $status = 'text-danger';
                                            } else {
                                                $status = 'text-grey-secondary';
                                            }
                                        @endphp --}}

                                        @php
                                            $status;
                                            if ($invoice->status_order === 'process' || $invoice->status_order === 'done') {
                                                $status = 'text-green';
                                            } else {
                                                $status = 'text-danger';
                                            }
                                        @endphp
                                        <p>Invoice #{{ $invoice->invoice }}</p>

                                        @if ($invoice->status_order === 'order')
                                            <p class="text-grey">{{ strtoupper($invoice->status_order) }}</p>
                                        @elseif ($invoice->status_order === 'cancel' || $invoice->status_order === 'failed')
                                            <p class="{{ $status }}">{{ strtoupper($invoice->status_order) }}</p>
                                        @else
                                            <p class="{{ $status }}">{{ strtoupper($invoice->status_order) }}</p>
                                        @endif
                                    </span>
                                    <div class="px-3">
                                        <span class="flex flex-row justify-between items-center pt-2">
                                            <p>Total</p>
                                            <p>{{ \App\Helpers\CurrencyFormat::data($invoice->total) }}</p>
                                        </span>
                                        <span class="flex flex-row justify-between items-center">
                                            <p>Shipping</p>
                                            <p>{{ $invoice->shipping_code . ' ' . $invoice->shipping_service }}</p>
                                        </span>
                                        @if ($invoice->payment)
                                            <span
                                                class="flex flex-row justify-between items-center font-bold text-pink-primary">
                                                <p>Payment</p>
                                                <p>{{ strtoupper($invoice->payment->bank) }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </td>
                        {{-- Desktop display --}}
                        <td class="hidden lg:table-cell ">
                            <a href="{{ $invoice->status_order ==='order' && $invoice->status_payment ==='unpaid' ? '#' : url('invoice/' . $invoice->invoice) }}">
                                <p class="text-center {{ $invoice->status_order ==='order' && $invoice->status_payment ==='unpaid' ? 'opacity-20' : 'hover:text-pink-primary' }} ">{{ $invoice->invoice }}</p>
                            </a>
                        </td>
                        <td class="hidden lg:table-cell ">
                            {{-- @php
                                $status;
                                if ($invoice->status === 'process') {
                                    $status = 'text-green';
                                } elseif ($invoice->status === 'failed') {
                                    $status = 'text-danger';
                                } else {
                                    $status = 'text-grey-secondary';
                                }
                            @endphp --}}
                            {{-- @php
                                $status;
                                if ($invoice->status_order === 'order' || $invoice->status_order === 'process' || $invoice->status_order === 'done') {
                                    $status = 'text-center text-green';
                                } else{
                                    $status = 'text-center text-danger';
                                }
                            @endphp --}}
                            {{-- <p class="text-center {{ $status }} ">{{ strtoupper($invoice->status) }}</p> --}}
                            {{-- handle failed transaction --}}
                            {{-- @if ($invoice->status_order === 'process' || $invoice->status_order === 'done' || $invoice->status_order === 'open')
                                <p class="text-center text-green">{{ strtoupper($invoice->status_order) }}</p>
                            @else
                                <p class="text-center text-danger">{{ strtoupper('Failed') }}</p>
                            @endif --}}


                            @if ($invoice->status_order === 'order')
                                <span class="flex gap-4 items-center justify-center">
                                    <p class="text-grey">{{ strtoupper($invoice->status_order) }}</p>
                                    @php
                                        $currentDate = new DateTime();
                                        $invoiceDate = new DateTime($invoice->created_at); 
                                    @endphp

                                    {{-- if invoice date is still at same day, show button pay --}}
                                    @if (($invoice->status_payment === 'unpaid' || $invoice->status_payment === 'pending' ) && $currentDate->format('Y-m-d') == $invoiceDate->format('Y-m-d')) 
                                        <a href="{{ url('payment/' . $invoice->invoice) }}" class="btn btn-sm bg-grey hover:bg-green text-white">Pay Now</a>
                                    @endif
                                </span>
                            @elseif ($invoice->status_order === 'cancel' || $invoice->status_order === 'failed')
                                <p class="{{ $status }} text-center">{{ strtoupper($invoice->status_order) }}</p>
                            @else
                                <p class="{{ $status }} text-center">{{ strtoupper($invoice->status_order) }}</p>
                            @endif
                        </td>
                        <td class="hidden lg:table-cell ">
                            <p class="text-center">{{ $invoice->shipping_code . ' ' . $invoice->shipping_service }}</p>
                        </td>
                        <td class="hidden lg:table-cell ">
                            <p class="text-center">{{ \App\Helpers\CurrencyFormat::data($invoice->total) }}</p>
                        </td>
                        <td class="hidden lg:table-cell ">
                            @if ($invoice->status_payment === 'pending')
                                <p class="text-center font-bold">{{ strtoupper($invoice->status_payment) }}</p>
                            @elseif ($invoice->status_payment === 'paid')
                                <p class="text-center font-bold text-green">{{ strtoupper($invoice->status_payment) }}</p>
                            @else
                                <p class="text-center font-bold text-danger">UNPAID</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4 mt-8 pagination">
            {{ $invoices->links() }}
        </div>

    </div>
@endsection
