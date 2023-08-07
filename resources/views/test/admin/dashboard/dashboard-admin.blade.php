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
                <th colspan="11">Count Dashboard: $order_pending, $order_process, $order_done</th>
            </tr>
                <th>Order Pending</th>
                <th>Order Process</th>
                <th>Order Done</th>
            </tr>
        </thead>
            <tr>
                <td>{{$orders_status['pending']}}</td>
                <td>{{$orders_status['process']}}</td>
                <td>{{$orders_status['done']}}</td>
            </tr>
    </table>
</body>
</html>