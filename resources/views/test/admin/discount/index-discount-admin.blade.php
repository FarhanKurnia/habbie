<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Discounts--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Offers: $indexDiscounts</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>description</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($indexDiscounts as $discount)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $discount->name }}</td>
                    <td>{{ $discount->description }}</td>
                    <td>{{ $discount->status }}</td>
                    <td>
                        <a href="{{route('showDiscounts',$discount->slug)}}">Show </a>
                        <a href="{{route('editDiscounts',$discount->slug)}}">Edit </a>
                        <a href="{{route('deleteDiscounts',$discount->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $indexDiscounts->currentPage() }} <br/>
Jumlah Data : {{ $indexDiscounts->total() }} <br/>
Data Per Halaman : {{ $indexDiscounts->perPage() }} <br/>
{{ $indexDiscounts->links() }}
</body>
</html>