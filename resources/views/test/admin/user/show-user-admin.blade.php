<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Users--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="10">Show one user using: $user</th>
            </tr>
            <tr>
                <th>customer_id</th>                
                <th>name</th>                
                <th>email</th>
                <th>role_id</th>                
                <th>email_verified_at</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->customer_id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->email_verified_at }}</td>
            </tr>
        </tbody>
    </table>
<br>
    {{-- Orders--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Order user: $orders</th>
            </tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product</th>
                <th>Total</th>
                <th>status_order</th>
                <th>status_payment</th>
            </tr>
        </thead>
            @php
                $no = '1';
            @endphp
            @foreach($orders as $order)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $order->invoice }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address}}, {{$order->city}}, {{$order->subdistrict}}, {{$order->province}}, {{$order->postal_code}}</td>
                    <td>
                    @foreach($order->orderproduct as $index=>$product)
                        - {{$order->orderproduct[$index]->product->name}} ({{$order->orderproduct[$index]->qty}})<br>
                    @endforeach
                    </td>
                    <td>
                        Rp. {{$order->total}}
                    </td>
                    <td>
                        {{$order->status_order}}
                    </td>
                    <td>
                        {{$order->status_payment}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>