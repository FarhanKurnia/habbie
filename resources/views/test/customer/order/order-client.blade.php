<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form order -->
    <form action="/proses" method="post">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Request Order</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="nama" value="{{ old('nama') }}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="alamat" value="{{ old('address') }}"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('phone') }}"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>