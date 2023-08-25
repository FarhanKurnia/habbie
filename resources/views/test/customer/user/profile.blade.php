<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Users--}}
    <!-- form update -->
    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Profile</th>
            </tr>
            <tr>
                <td>customer id</td>
                <td><input class="form-control" type="text" name="customer_id" value="{{ old('customer_id', $user->customer_id) }}" disabled></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}" disabled></td>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
<br>
</body>
</html>