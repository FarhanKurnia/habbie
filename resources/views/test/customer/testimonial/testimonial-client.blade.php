<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Testimonials--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Testimonials using: $testimonials</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>image</th>
                <th>profesi</th>
                <th>lokasi</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->image }}</td>
                    <td>{{ $testimonial->profesi }}</td>
                    <td>{{ $testimonial->lokasi }}</td>
                    <td>{{ $testimonial->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
{{-- Reviews--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Reviews using: $testimonials</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>rating</th>
                <th>description</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>