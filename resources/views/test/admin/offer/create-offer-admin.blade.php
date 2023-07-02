<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form create category -->
    <form action="{{ route('storeOffers') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Offers</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input class="form-control" type="text" name="image"></td>
            </tr>
            <tr>
                <td>description</td>
                <td><input class="form-control" type="text" name="description"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option value=active>active</option>
                        <option value=non-active>non-active</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Product</td>
                <td>
                    <select name="product" id="product">
                        @foreach($indexProduct as $product)
                            <option value={{ $product->id_product }}>{{ $product->name }}</option>
                        @endforeach
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