<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateCategories',$oneCategory->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="2">Form Update Products</th>
            </tr>
            <tr>
                <td>Icon</td>
                <td><p style="text-align:center;"><img src="{{ url($oneCategory->icon) }}" alt="{{ $oneCategory->icon }}" style="width:50px;height:50px;"></p></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $oneCategory->name) }}" required></td>
            </tr>
            <tr>
                <td>Change Icon</td>
                <td><input class="form-control" type="file" name="icon"></td>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>