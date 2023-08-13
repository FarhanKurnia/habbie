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
                <th colspan="11">Info User using: $user</th>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role->name }}</td>
            </tr>
        </thead>
    </table>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Count Dashboard: $orders_status[]</th>
            </tr>
                <th>Order</th>
                <th>Process</th>
                <th>Failed</th>
                <th>Done</th>
                <th>All</th>
            </tr>
        </thead>
            <tr>
                <td>{{$orders_status['order']}}</td>
                <td>{{$orders_status['process']}}</td>
                <td>{{$orders_status['failed']}}</td>
                <td>{{$orders_status['done']}}</td>
                <td>{{$orders_status['all_order']}}</td>
            </tr>
    </table>
    <br>
    {{-- <table border="1">
        <thead>
            <tr>
                <th colspan="11">Count revenue: $revenue->total</th>
            </tr>
                <th>Total Revenue</th>
            </tr>
        </thead>
        @php
            $total=0;
            foreach ($orders_revenue as $revenue) {
                $total=$total+$revenue->total;
            }
        @endphp
        <tr>
            <td>Rp. {{($total)}}</td>
        </tr>
    </table> --}}
    <br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Order need to process: $order</th>
            </tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product</th>
                <th>Total</th>

            </tr>
        </thead>
            @php
                $no = '1';
            @endphp
            @foreach($ordering as $order)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address}}, {{$order->city}}, {{$order->subdistrict}}, {{$order->province}}, {{$order->postal_code}}</td>
                    <td>
                    {{-- @php
                        dd($order->orderproduct[1]->product);
                    @endphp --}}

                    @foreach($order->orderproduct as $index=>$product)
                        - {{$order->orderproduct[$index]->product->name}} ({{$order->orderproduct[$index]->qty}})<br>
                    @endforeach
                    </td>
                    <td>
                        Rp. {{$order->total}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $ordering->currentPage() }} <br/>
Jumlah Data : {{ $ordering->total() }} <br/>
Data Per Halaman : {{ $ordering->perPage() }} <br/>
{{ $ordering->links() }}
</body>
</html>