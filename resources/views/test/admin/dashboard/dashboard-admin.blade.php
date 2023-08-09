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
                <th colspan="11">Count Dashboard: $orders_status['all_order','process','done']</th>
            </tr>
                <th>Order Pending</th>
                <th>Order Process</th>
                <th>Order Done</th>
            </tr>
        </thead>
            <tr>
                <td>{{$orders_status['all_order']}}</td>
                <td>{{$orders_status['process']}}</td>
                <td>{{$orders_status['done']}}</td>
            </tr>
    </table>
<br>
    <table border="1">
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

    </table>
</body>
</html>