<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateResellers',$reseller->reseller_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Reseller</th>
            </tr>
            <tr>
                <td>reseller id</td>
                <td><input class="form-control" type="text" name="reseller_id" value="{{ old('reseller_id', $reseller->reseller_id) }}" disabled></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $reseller->name) }}" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('email', $reseller->email) }}" disabled></td>
            </tr>
           <tr>
                <td>gender</td>
                <td><input class="form-control" type="text" name="gender" value="{{ old('gender', $reseller->gender) }}" required></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input class="form-control" type="text" name="phone" value="{{ old('phone', $reseller->phone) }}" required></td>
            </tr>
            <tr>
                <td>birth_date</td>
                <td><input class="form-control" type="date" name="birth_date" value="{{ old('birth_date', $reseller->birth_date) }}" required></td>
            </tr>
            <tr>
                <td>identity_card</td>
                <td><input class="form-control" type="text" name="identity_card" value="{{ old('identity_card', $reseller->identity_card) }}" required></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input class="form-control" type="text" name="status" value="{{ old('status', $reseller->status) }}" disabled></td>
            </tr>
            <tr>
                <td>address</td>
                <td><input class="form-control" type="text" name="address" value="{{ old('address', $reseller->address) }}" required></td>
            </tr>
            <tr>
                <td>province</td>
                <td><input class="form-control" type="text" name="province" value="{{ old('province', $reseller->province) }}" required></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input class="form-control" type="text" name="city" value="{{ old('city', $reseller->city) }}" required></td>
            </tr>
            <tr>
                <td>subdistrict</td>
                <td><input class="form-control" type="text" name="subdistrict" value="{{ old('subdistrict', $reseller->subdistrict) }}" required></td>
            </tr>
            <tr>
                <td>postal_code</td>
                <td><input class="form-control" type="text" name="postal_code" value="{{ old('postal_code', $reseller->postal_code) }}" required></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>