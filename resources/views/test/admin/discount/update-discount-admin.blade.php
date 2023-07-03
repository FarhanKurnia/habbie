<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateDiscounts',$oneDiscount->slug) }}" method="POST">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Discount</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $oneDiscount->name) }}" required></td>
            </tr>
            <tr>
                <td>discount</td>
                <td><input class="form-control" type="text" name="rule" value="{{ old('rule', $oneDiscount->rule) }}"></td>
            </tr>
            <tr>
                <td>description</td>
                <td><input class="form-control" type="text" name="description" value="{{ old('description', $oneDiscount->description) }}"required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option value="active" {{ $oneDiscount->status == "active" ? 'selected':'' }}>active</option>
                        <option value="non-active" {{ $oneDiscount->status == "non-active" ? 'selected':'' }}>non-active</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>