<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateOrders',$order->invoice) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="2">Update Order</th>
            </tr><tr>
                <th>invoice</th>
                <td>#{{ $order->invoice }}</td>
            </tr>
            <tr>
                <th>name</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>phone</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>address</th>
                <td>{{ $order->address.', '.$order->subdistrict.', '.$order->city.', '.$order->province.' '.$order->postal_code}}</td>
            </tr>
            <tr>
                <th>shipping</th>
                <td>{{ $order->shipping_code.' '.$order->shipping_service }}</td>
            </tr>
            <tr>
                <th>shipping_value</th>
                <td>Rp. {{ $order->shipping_value }}</td>
            </tr>
            <tr>
                <th>sub_total</th>
                <td>Rp. {{ $order->sub_total }}</td>
            </tr>
            <tr>
                <th>total</th>
                <td>Rp. {{ $order->total }}</td>
            </tr>
            <tr>
                <th>payment</th>
                <td>{{ $order->status_payment}}</td>
            </tr>
            <tr>
                <th>status</th>
                <td>
                    <select name="status_order">
                        <option {{old('status_order',$order->status_order)=="order"? 'selected':''}} value="order">order</option>
                        <option {{old('status_order',$order->status_order)=="process"? 'selected':''}}  value="process">process</option>
                        <option {{old('status_order',$order->status_order)=="cancel"? 'selected':''}} value="cancel">cancel</option>
                        <option {{old('status_order',$order->status_order)=="failed"? 'selected':''}} value="failed">failed</option>
                        <option {{old('status_order',$order->status_order)=="done"? 'selected':''}} value="done">done</option>               
                    </select>
                </td>
            </tr>
            <tr>
                <th>resi</th>
                <td><input class="form-control" type="text" name="resi" value="{{ old('resi', $order->resi) }}" autofocus></td>
            </tr>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>