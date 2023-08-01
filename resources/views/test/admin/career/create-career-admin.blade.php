<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form create career -->
    <form action="{{ route('storeCareers') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Careers</th>
            </tr>
            <tr>
                <td>title</td>
                <td><input class="form-control" type="text" name="title" required></td>
            </tr>
            <tr>
                <td>post</td>
                <td><input class="form-control" type="text" name="post"></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input class="form-control" type="text" name="image"></td>
            </tr>
            <tr>
                <td>user_id</td>
                <td><input class="form-control" type="text" name="user_id"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>