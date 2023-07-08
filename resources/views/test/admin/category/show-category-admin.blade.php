<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- One Category--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="2">Show one product using: $oneCategory</th>
            </tr>
            <tr>
                <th>name</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $oneCategory->name }}</td>
                <td>{{ $oneCategory->slug }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>