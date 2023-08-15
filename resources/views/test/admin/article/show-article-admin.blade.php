<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- One Product--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="9">Show one Offer using: $oneOffer</th>
            </tr>
            <tr>
                <th>image</th>
                <th>title</th>
                <th>slug</th>
                <th>post</th>
                <th>user_id</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p style="text-align:center;"><img src="{{ url($oneArticle->image) }}" alt="{{ $oneArticle->image }}" style="width:50px;height:50px;"></p></td>
                <td>{{ $oneArticle->title }}</td>
                <td>{{ $oneArticle->slug }}</td>
                <td>{{ $oneArticle->post }}</td>
                <td>{{ $oneArticle->user->name }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>