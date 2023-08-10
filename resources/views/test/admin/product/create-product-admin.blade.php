<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form order -->
    <form action="{{ route('storeProducts') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th colspan="2">Form Add Products</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input class="form-control" type="text" name="description" required></td>
            </tr>
            <tr>
                <td>Story</td>
                <td><input class="form-control" type="text" name="story" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input class="form-control" type="text" name="price" required></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><input class="form-control" type="text" name="weight" required></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input class="form-control" type="text" name="stock" required></td>
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
                <td>Discount</td>
                <td>
                    <select name="discount" id="discount">
                        <option value="">Tidak ada</option>
                        @foreach($indexDiscounts as $discount)
                            <option value={{ $discount->id_discount }}>{{ $discount->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Categories</td>
                <td>
                    <select name="category" id="category">
                        @foreach($indexCategories as $category)
                            <option value={{ $category->id_category }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input class="form-control" type="file" name="image"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>