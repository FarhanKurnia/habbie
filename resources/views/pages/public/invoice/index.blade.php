@extends('layouts.base-layout')

@section('title', 'Invoice')

@section('content')
    <div class="container mx-auto pt-14 px-6 lg:px-0">
        @include('components.public.partials.title', [
            'title' => 'List Invoice',
            'align' => 'left',
            'color' => 'pink-primary',
        ])

        <table class="min-w-full divide-y divide-gray-200 table">
            <thead>
                <tr class="bg-grey-secondary-50">
                    {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm lg:hidden"></p>
                    </th> --}}
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">invoice</p>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <p class="font-bold text-sm">Status</p>
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
                        <p class="font-bold text-sm">Payment</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="hidden">

                        </td>
                        <td>
                            <p class="text-center hover:text-pink-primary">{{ $invoice->invoice }}</p>
                        </td>
                        <td>
                            <p class="text-center bg-pink-primary inline-block">{{ strtoupper($invoice->status) }}</p>
                        </td>
                        <td>
                            <p class="text-center">{{ $invoice->shipping_code . ' ' . $invoice->shipping_service }}</p>
                        </td>
                        <td>
                            <p class="text-center">{{ \App\Helpers\CurrencyFormat::data($invoice->total) }}</p>
                        </td>
                        <td>
                            <p class="text-center">Test</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
