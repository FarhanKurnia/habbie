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
                <th>name</th>
                <th>description</th>
                <th>product_id</th>
                <th>status</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p style="text-align:center;"><img src="{{ url($oneOffer->image) }}" alt="{{ $oneOffer->image }}" style="width:50px;height:50px;"></p></td>
                <td>{{ $oneOffer->name }}</td>
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