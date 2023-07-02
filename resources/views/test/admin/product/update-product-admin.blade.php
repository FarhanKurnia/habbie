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
                <td><input class="form-control" type="text" name="nama" value="{{ old('name') }}" required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input class="form-control" type="text" name="alamat" value="{{ old('image') }}"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('description') }}"required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('price') }}"required></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('stock') }}"required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('rating') }}"required></td>
            </tr>
            {{-- <tr>
                <td>Discount</td>
                <td><input class="form-control" type="text" name="email" value="{{ old('discount_id') }}"></td>
            </tr> --}}
            <tr>
                <td>Discount</td>
                <td>
                    <select name="discount" id="discount">
                        <option value=null>Tidak ada</option>
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
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>