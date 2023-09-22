<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('setTermReseller',$term_reseller->slug) }}" method="POST">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Term And Condition Reseller</th>
            </tr>
            <tr>
                <td>Information</td>
                <td><input class="form-control" type="text" name="information" value="{{ old('information', $term_reseller->information) }}" required></td>
            </tr>
            <tr>
                <td>Term & Condition</td>
                <td><input class="form-control" type="text" name="term" value="{{ old('term', $term_reseller->term) }}" required></td>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>