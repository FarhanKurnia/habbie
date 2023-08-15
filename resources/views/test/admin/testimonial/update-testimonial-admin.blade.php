<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateTestimonials',$testimonial->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="2">Form Update Testimonials</th>
            </tr>
            <tr>
                <td>Image</td>
                <td><p style="text-align:center;"><img src="{{ url($testimonial->image) }}" alt="{{ $testimonial->image }}" style="width:50px;height:50px;"></p></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $testimonial->name) }}" required></td>
            </tr>
            <tr>
                <td>Profesi</td>
                <td><input class="form-control" type="text" name="profesi" value="{{ old('profesi', $testimonial->profesi) }}"required></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><input class="form-control" type="text" name="lokasi" value="{{ old('lokasi', $testimonial->lokasi) }}"required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="description" value="{{ old('description', $testimonial->description) }}"required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input class="form-control" type="file" name="image"></td>
            </tr>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>