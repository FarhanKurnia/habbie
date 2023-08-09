<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Detail Career--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="9">Show one Career using: $career</th>
            </tr>
            <tr>
                <th>title</th>
                <th>image</th>
                <th>slug</th>
                <th>post</th>
                <th>user_id</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $career->title }}</td>
                <td>{{ $career->image }}</td>
                <td>{{ $career->slug }}</td>
                <td>{{ $career->post }}</td>
                <td>{{ $career->user->name }}</td>
                <td>{{ route('showCareerClient',$career->slug) }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>