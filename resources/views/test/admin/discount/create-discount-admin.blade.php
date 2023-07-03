<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form create Discount -->
    <form action="{{ route('storeDiscounts') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Discounts</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>rule</td>
                <td><input class="form-control" type="text" name="rule"></td>
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