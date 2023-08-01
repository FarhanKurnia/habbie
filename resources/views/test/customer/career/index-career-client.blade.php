<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Careers--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Careers: $careers</th>
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
            @foreach($careers as $career)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $career->title }}</td>
                    <td>{{ $career->slug }}</td>
                    <td>{{ $career->excerpt }}</td>
                    <td>{{ $career->user->name }}</td>
                    <td>{{ route('showCareerClient',$career->slug) }}</td>
                    <td>
                        <a href="{{route('showCareerClient',$career->slug)}}">Show </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $careers->currentPage() }} <br/>
Jumlah Data : {{ $careers->total() }} <br/>
Data Per Halaman : {{ $careers->perPage() }} <br/>
{{ $careers->links() }}
</body>
</html>