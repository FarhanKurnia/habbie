<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Top Articles--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">articles using: $oneArticle</th>
            </tr>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>image</th>
                <th>post</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $oneArticle->title }}</td>
                <td>{{ $oneArticle->image }}</td>
                <td>{{ $oneArticle->post }}</td>
                <td>{{ $oneArticle->slug }}</td>
            </tr>
        </tbody>
    </table>
<br>
{{-- Related Articles--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Reviews using: $latestArticles</th>
            </tr>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>image</th>
                <th>post</th>
                <th>slug</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($latestArticles as $latestArticle)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $latestArticle->title }}</td>
                    <td>{{ $latestArticle->image }}</td>
                    <td>{{ $latestArticle->post }}</td>
                    <td>{{ $latestArticle->slug }}</td>
                    <td>
                        @php
                            echo url("/test/media/{$latestArticle->slug}"); 
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>