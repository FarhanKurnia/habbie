@extends('layouts.admin-layout')

@section('title', 'Update Order')

@section('content')
    @php
        $colorStatus = [
            'paid' => 'bg-green text-white',
            'unpaid' => 'bg-danger text-white',
            'pending' => 'bg-grey-secondary',
            'done' => 'bg-green text-white',
            'failed' => 'bg-danger text-white',
            'cancel' => 'bg-danger text-white bg-opacity-50',
            'order' => 'bg-grey-secondary ',
            'process' => 'bg-green text-white bg-opacity-40',
        ];
        
        $status = ['order', 'process', 'cancel', 'failed', 'done'];
        
    @endphp
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10 ">

        @if (session()->has('success'))
            <div class="p-4 bg-teal rounded mb-4">
                {!! session('success') !!}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="p-4 bg-danger rounded mb-4 text-white">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-2xl text-grey">Update Order</h1>

        <div class="my-6 flex flex-col gap-6">
            {{-- <div class="bg-white p-4 rounded grid grid-cols-1 lg:grid-cols-3 gap-10"> --}}
            <form class="bg-white p-4 rounded grid grid-cols-1 lg:grid-cols-3 gap-10" method="POST"
                enctype="multipart/form-data" action="{{ route('updateOrders', $order->invoice) }}">
                @csrf
                @method('PATCH')
                <div class="col-span-2">
                    <div>
                        <h3 class="text-lg font-bold mb-2  text-pink-primary">Order Information</h3>
                        <span class="text-grey">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $order->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $order->address . ', ' . $order->subdistrict . ', ' . $order->city . ', ' . $order->province . ' ' . $order->postal_code }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Note</td>
                                        <td>{!! $order->note !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-pink-primary font-bold">Shipping</td>
                                        <td>{{ $order->shipping_code . ' ' . $order->shipping_service }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Weight</td>
                                        <td>{{ $order->total_weight . ' gram' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Estimation</td>
                                        <td>{{ $order->shipping_etd . ' day' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Resi</td>
                                        <td>
                                            <span>
                                                <input type="text" name="resi"
                                                    class="input input-bordered input-sm w-full bg-grey-secondary-50 "
                                                    placeholder="Input Resi"
                                                    value="{{ isset($order) ? $order->resi : old('resi') }}">
                                                @error('resi')
                                                    @include('components.public.partials.error-message', [
                                                        'message' => $message,
                                                    ])
                                                @enderror
                                            </span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Order Status</td>
                                        <td>
                                            <select name="status_order" class="select select-bordered w-full max-w-xs">
                                                @foreach ($status as $item)
                                                    <option {{ $order->status_order === $item ? 'selected' : '' }}
                                                        value="{{ $item }}">{{ ucfirst($item) }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-pink-primary font-bold">Payment Status</td>
                                        <td class="rounded {{ $colorStatus[$order->status_payment] }}">
                                            {{ ucfirst($order->status_payment) }}
                                        </td>
                                    </tr>
                                    @if ($order->payment)
                                        <tr>
                                            <td>Information</td>
                                            <td>{!! 'transaction : ' .
                                                $order->payment->transaction_status .
                                                ' </br> ' .
                                                str_replace('_', ' ', $order->payment->payment_type) .
                                                ' : ' .
                                                ucfirst($order->payment->bank) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td class="font-bold">
                                                {{ \App\Helpers\CurrencyFormat::data($order->payment->gross_amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $order->payment->transaction_time }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button type="submit" value="Proses" class="my-4 btn btn-primary text-white ">Update </button>
                        </span>

                    </div>
                </div>
                <div>
                    <div>
                        <h3 class="text-lg font-bold mb-2  text-pink-primary">Order Item</h3>
                        <div class="text-grey flex flex-col gap-6 my-6">

                            @foreach ($order->orderproduct as $item)
                                <div class="grid grid-cols-3 items-center gap-2">
                                    <img class="h-14 mx-auto " src="{{ url($item->product->image) }}"
                                        alt="{{ $item->product->name }}">
                                    <span class="col-span-2">
                                        <p class="text-sm">{{ $item->product->name }}</p>
                                        <p class="text-sm">{!!  ( $item->discount_id ? " <s>" . \App\Helpers\CurrencyFormat::data($item->price) . "</s> " . \App\Helpers\CurrencyFormat::data($item->sub_total_price) : \App\Helpers\CurrencyFormat::data($item->price) ). " x " . $item->qty !!}</p>

                                    </span>
                                </div>
                            @endforeach
                            {{-- {{ $order->orderproduct }} --}}
                        </div>
                        <div class="flex flex-col gap-2 p-4 bg-grey-secondary rounded">
                            <span class="flex justify-between">
                                <p>Subtotal</p>
                                <p>{{ \App\Helpers\CurrencyFormat::data($order->sub_total) }}</p>
                            </span>
                            <span class="flex justify-between">
                                <p>Shipping Price</p>
                                <p>{{ \App\Helpers\CurrencyFormat::data($order->shipping_value) }}</p>
                            </span>
                            <span
                                class="flex justify-between my-4 px-4 py-2 font-bold  rounded {{ $colorStatus[$order->status_order] }}">
                                <p>Total</p>
                                <p>{{ \App\Helpers\CurrencyFormat::data($order->total) }}</p>
                            </span>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
