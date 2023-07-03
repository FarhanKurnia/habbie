<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Articles--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Offers: $indexArticles</th>
            </tr>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>slug</th>
                <th>excerpt</th>
                <th>user_id</th>
                <th>link</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($indexArticles as $article)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->slug }}</td>
                    <td>{{ $article->excerpt }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ route('showArticles',$article->slug) }}</td>
                    <td>
                        <a href="{{route('showArticles',$article->slug)}}">Show </a>
                        <a href="{{route('editArticles',$article->slug)}}">Edit </a>
                        <a href="{{route('deleteArticles',$article->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $indexArticles->currentPage() }} <br/>
Jumlah Data : {{ $indexArticles->total() }} <br/>
Data Per Halaman : {{ $indexArticles->perPage() }} <br/>
{{ $indexArticles->links() }}
</body>
</html>