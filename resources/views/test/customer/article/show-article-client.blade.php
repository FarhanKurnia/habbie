<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- One Article--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="9">Show one Offer using: $oneArticle</th>
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
                <td>{{ $oneArticle->title }}</td>
                <td>{{ $oneArticle->image }}</td>
                <td>{{ $oneArticle->slug }}</td>
                <td>{{ $oneArticle->post }}</td>
                <td>{{ $oneArticle->user->name }}</td>
                <td>{{ route('showArticles',$oneArticle->slug) }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>