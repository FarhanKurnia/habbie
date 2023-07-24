<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>  
<table border="1">
    <thead>
        <tr>
            <th colspan="11">Invoice using: $invoices</th>
        </tr>
        <tr>
            <th>invoice</th>
            <td>{{ $invoices->invoice }}</td>
        </tr>
        <tr>
            <th>name</th>
            <td>{{ $invoices->name }}</td>
        </tr>
        <tr>
            <th>email</th>
            <td>{{ $invoices->email }}</td>
        </tr>
        <tr>
            <th>phone</th>
            <td>{{ $invoices->phone }}</td>
        </tr>
        <tr>
            <th>address</th>
            <td>{{ $invoices->address.','.$invoices->subdistrict.','.$invoices->city.','.$invoices->province.','.$invoices->postal_code}}</td>
        </tr>
        <tr>
            <th>status</th>
            <td>{{ $invoices->status }}</td>
        </tr>
        <tr>
            <th>shipping</th>
            <td>{{ $invoices->shipping_code.' '.$invoices->shipping_service }}</td>
        </tr>
        <tr>
            <th>shipping_value</th>
            <td>Rp. {{ $invoices->shipping_value }}</td>
        </tr>
        <tr>
            <th>sub_total</th>
            <td>Rp. {{ $invoices->sub_total }}</td>
        </tr>
        <tr>
            <th>total</th>
            <td>Rp. {{ $invoices->total }}</td>
        </tr>
        <tr>
            <th>resi</th>
            @if ($invoices->resi)
                <td>{{$invoices->resi}}</td>
            @else
                <td> null </td>
            @endif
        </tr>
    </thead>
</table>
<br>
{{-- orders--}}
@if($invoices->payment)
<table border="1">
    <thead>
        <tr>
            <th colspan="11">Payments using: $invoices->payment</th>
        </tr>
        <tr>
            <th>va_number</th>
            <th>bank</th>
            <th>payment_type</th>
            <th>transaction_status</th>
            <th>gross_amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $invoices->payment->va_number }}</td>
            <td>{{ $invoices->payment->bank }}</td>
            <td>{{ $invoices->payment->payment_type }}</td>
            <td>{{ $invoices->payment->transaction_status }}</td>
            <td>{{ $invoices->payment->gross_amount }}</td>
        </tr>
    </tbody>
</table>
<br>
@else
<table border="1">
    <thead>
        <tr>
            <th colspan="11">No Payment</th>
        </tr>
    </thead>
</table>
<br>
@endif

{{-- orders--}}
<table border="1">
    <thead>
        <tr>
            <th colspan="11">Orders using: $orders</th>
        </tr>
        <tr>
            <th>No</th>
            <th>product_id</th>
            <th>price</th>
            <th>discount</th>
            <th>discount_price</th>
            <th>sub_total_price</th>
            <th>qty</th>
            <th>total_price</th>

        </tr>
    </thead>
    <tbody>
        @php
            $no = '1';
        @endphp
        @foreach($orders as $order)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->price }}</td>
                @if($order->discount)
                    <td>{{ $order->discount->name }}</td>
                @else
                    <td> null</td>
                @endif
                <td>{{ $order->discount_price }}</td>
                <td>{{ $order->sub_total_price }}</td>
                <td>{{ $order->qty }}</td>
                <td>{{ $order->total_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
</body>
</html>