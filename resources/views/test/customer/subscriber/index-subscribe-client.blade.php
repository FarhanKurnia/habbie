<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Subscriber--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Subscriber</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $subscriber->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- <br>
Halaman : {{ $subscriber->currentPage() }} <br/>
Jumlah Data : {{ $subscriber->total() }} <br/>
Data Per Halaman : {{ $subscriber->perPage() }} <br/>
{{ $subscriber->links() }} --}}
</body>
</html>