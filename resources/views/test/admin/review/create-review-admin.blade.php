<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form create Review -->
    <form action="{{ route('storeReviews') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Reviews</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>
                    <select name="rating" id="rating">
                        <option value=5>*****</option>
                        <option value=4>****</option>
                        <option value=3>***</option>
                        <option value=2>**</option>
                        <option value=1>*</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>description</td>
                <td><input class="form-control" type="text" name="description"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>