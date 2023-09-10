@extends('layouts.admin-layout')
@section('title', 'User Detail')
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
@endphp
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="my-6 flex flex-col gap-6">
            <div class="bg-white p-4 rounded grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="col-span-2">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer id</td>
                                <td>{{ $user->customer_id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>{{ $user->role->name }}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Email Verified</td>
                                <td>{{ $user->email_verified ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>Email Verified at</td>
                                <td>{{ $user->email_verified_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            @if (isset($orders))
                <h3>History Order</h3>
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->invoice }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}, {{ $order->city }}, {{ $order->subdistrict }},
                                    {{ $order->province }}, {{ $order->postal_code }}</td>
                                <td>
                                    @foreach ($order->orderproduct as $index => $product)
                                        - {{ $order->orderproduct[$index]->product->name }}
                                        ({{ $order->orderproduct[$index]->qty }})
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    {{ \App\Helpers\CurrencyFormat::data($order->total) }}
                                </td>
                                <td>
                                    <span class="{{ $colorStatus[$order->status_order] }} px-4 py-2 rounded">{{ ucfirst($order->status_order) }}</span>
                                </td>
                                <td >
                                    <span class="{{ $colorStatus[$order->status_order] }} px-4 py-2 rounded">{{ ucfirst($order->status_payment) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
