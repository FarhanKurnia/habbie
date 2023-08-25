<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <a href="{{route('createReviews')}}">+ Add</a>
    {{-- Review--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Reviews: $reviews</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>rating</th>
                <th>description</th>
                <th>user_id</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->description }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>
                        <a href="{{route('editReviews',$review->id_review)}}">Edit </a>
                        <a href="{{route('deleteReviews',$review->id_review)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $reviews->currentPage() }} <br/>
Jumlah Data : {{ $reviews->total() }} <br/>
Data Per Halaman : {{ $reviews->perPage() }} <br/>
{{ $reviews->links() }}
</body>
</html>