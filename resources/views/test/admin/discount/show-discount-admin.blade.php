<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- One Discount--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="9">Show one Discount using: $oneDiscount</th>
            </tr>
            <tr>
                <th>name</th>
                <th>description</th>
                <th>discount</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $oneDiscount->name }}</td>
                <td>{{ $oneDiscount->description }}</td>
                <td>{{ $oneDiscount->rule }}%</td>
                <td>{{ $oneDiscount->status }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>