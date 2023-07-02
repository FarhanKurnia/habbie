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
                <th>name</th>
                <th>slug</th>
                <th>image</th>
                <th>description</th>
                <th>product_id</th>
                <th>status</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $oneOffer->name }}</td>
                <td>{{ $oneOffer->slug }}</td>
                <td>{{ $oneOffer->image }}</td>
                <td>{{ $oneOffer->description }}</td>
                <td>{{ $oneOffer->product->name }}</td>
                <td>{{ $oneOffer->status }}</td>
                <td>{{ route('showProducts',$oneOffer->product->slug) }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>