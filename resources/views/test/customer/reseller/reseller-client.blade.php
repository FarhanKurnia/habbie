<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form create reseller -->
    <form action="{{ route('joinReseller') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Reseller</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input class="form-control" type="text" name="email"></td>
            </tr>
            <tr>
                <td>gender</td>
                <td><input class="form-control" type="text" name="gender"></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input class="form-control" type="text" name="phone"></td>
            </tr>
            <tr>
                <td>birth_date</td>
                <td><input class="form-control" type="text" name="birth_date"></td>
            </tr>
            <tr>
                <td>identity_card</td>
                <td><input class="form-control" type="text" name="identity_card"></td>
            </tr>
            <tr>
                <td>address</td>
                <td><input class="form-control" type="text" name="address"></td>
            </tr>
            <tr>
                <td>province</td>
                <td><input class="form-control" type="text" name="province"></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input class="form-control" type="text" name="city"></td>
            </tr>
            <tr>
                <td>subdistrict</td>
                <td><input class="form-control" type="text" name="subdistrict"></td>
            </tr>
            <tr>
                <td>postal_code</td>
                <td><input class="form-control" type="text" name="postal_code"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>