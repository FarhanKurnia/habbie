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
                <th colspan="11">Offers: $indexOffers</th>
            </tr>
            <tr>
                <th>No</th>
                <th>image</th>                
                <th>name</th>
                <th>profesi</th>                
                <th>lokasi</th>
                <th>description</th>
                <th>user_id</th>
                <th>link</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($indexOffers as $offer)
                <tr>
                    <td>{{ $no++}}</td>
                    <td><p style="text-align:center;"><img src="{{ url($offer->image) }}" alt="{{ $offer->image }}" style="width:50px;height:50px;"></p></td>
                    <td>{{ $offer->name }}</td>
                    <td>{{ $offer->slug }}</td>
                    <td>{{ $offer->description }}</td>
                    <td>{{ $offer->product->name }}</td>
                    <td>{{ $offer->status }}</td>
                    <td>{{ route('showProducts',$offer->product->slug) }}</td>
                    <td>
                        <a href="{{route('showOffers',$offer->slug)}}">Show </a>
                        <a href="{{route('editOffers',$offer->slug)}}">Edit </a>
                        <a href="{{route('deleteOffers',$offer->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $indexOffers->currentPage() }} <br/>
Jumlah Data : {{ $indexOffers->total() }} <br/>
Data Per Halaman : {{ $indexOffers->perPage() }} <br/>
{{ $indexOffers->links() }}
</body>
</html>