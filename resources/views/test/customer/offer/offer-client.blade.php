<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Offers--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Offers using: $offers</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>image</th>
                <th>description</th>
                <th>link</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($offers as $offer)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $offer->name }}</td>
                    <td>{{ $offer->image }}</td>
                    <td>{{ $offer->description }}</td>
                    <td>{{ route('showProducts',$offer->product->slug) }}</td>
                    <td>{{ $offer->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>