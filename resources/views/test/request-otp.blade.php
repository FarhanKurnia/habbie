<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @if(session()->has('loginError'))
        {{session('loginError')}}
    @endif
    <!-- form order -->
    <form action="{{ route('requestOTPProcess') }}" method="POST">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Request OTP</th>
            </tr>
            <tr>
                <td>email</td>
                <td><input class="form-control" type="text" name="email" autofocus required></td>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>