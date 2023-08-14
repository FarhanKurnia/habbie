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
                <th colspan="11">Testimonials: $testimonials</th>
            </tr>
            <tr>
                <th>No</th>
                <th>image</th>                
                <th>name</th>
                <th>profesi</th>                
                <th>lokasi</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $no++}}</td>
                    <td><p style="text-align:center;"><img src="{{ url($testimonial->image) }}" alt="{{ $testimonial->image }}" style="width:50px;height:50px;"></p></td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->profesi }}</td>
                    <td>{{ $testimonial->lokasi }}</td>
                    <td>
                        <a href="{{route('showTestimonials',$testimonial->slug)}}">Show </a>
                        <a href="{{route('editTestimonials',$testimonial->slug)}}">Edit </a>
                        <a href="{{route('deleteTestimonials',$testimonial->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $testimonials->currentPage() }} <br/>
Jumlah Data : {{ $testimonials->total() }} <br/>
Data Per Halaman : {{ $testimonials->perPage() }} <br/>
{{ $testimonials->links() }}
</body>
</html>