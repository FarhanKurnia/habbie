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
                <th>icon</th>
                <th>name</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p style="text-align:center;"><img src="{{ url($oneCategory->icon) }}" alt="{{ $oneCategory->icon }}" style="width:50px;height:50px;"></p></td>
                <td>{{ $oneCategory->name }}</td>
                <td>{{ $oneCategory->slug }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>