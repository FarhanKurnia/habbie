<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Order need to process: $orders</th>
            </tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status Order</th>
                <th>Status Payment</th>
                <th>Resi</th>
                <th>Action</th>
            </tr>
        </thead>
            @php
                $no = '1';
            @endphp
            @foreach($orders as $order)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>#{{ $order->invoice }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address}}, {{$order->city}}, {{$order->subdistrict}}, {{$order->province}}, {{$order->postal_code}}</td>
                    <td>{{$order->status_order}}</td>
                    <td>{{$order->status_payment}}</td>
                    @if ($order->resi)
                        <td>{{$order->resi}}</td>
                    @else
                        <td>-</td>
                    @endif
                    
                    <td>
                        <a href="{{route('showOrders',$order->invoice)}}">Show </a>
                        <a href="{{route('editOrders',$order->invoice)}}">Update </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $orders->currentPage() }} <br/>
Jumlah Data : {{ $orders->total() }} <br/>
Data Per Halaman : {{ $orders->perPage() }} <br/>
{{ $orders->links() }}
</body>
</html>