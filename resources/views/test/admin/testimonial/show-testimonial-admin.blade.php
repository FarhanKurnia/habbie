<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Testimonial--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="10">Show one testimonial using: $testimonial</th>
            </tr>
            <tr>
                <th>image</th>                
                <th>name</th>
                <th>profesi</th>                
                <th>lokasi</th>
                <th>description</th>
                <th>user_id</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p style="text-align:center;"><img src="{{ url($testimonial->image) }}" alt="{{ $testimonial->image }}" style="width:50px;height:50px;"></p></td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->profesi }}</td>
                <td>{{ $testimonial->lokasi }}</td>
                <td>{{ $testimonial->description }}</td>
                <td>{{ $testimonial->user->name }}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>