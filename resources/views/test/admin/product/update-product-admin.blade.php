<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateProducts',$oneProduct->slug) }}" method="POST">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="2">Form Add Products</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $oneProduct->name) }}" required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input class="form-control" type="text" name="image" value="{{ old('image', $oneProduct->image) }}"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input class="form-control" type="text" name="description" value="{{ old('description', $oneProduct->description) }}"required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input class="form-control" type="text" name="price" value="{{ old('price', $oneProduct->price) }}"required></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input class="form-control" type="text" name="stock" value="{{ old('stock', $oneProduct->stock) }}"required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>
                    <select name="rating" id="rating">
                        <option value=5 {{ $oneProduct->rating == 5 ? 'selected':'' }}>*****</option>
                        <option value=4 {{ $oneProduct->rating == 4 ? 'selected':'' }}>****</option>
                        <option value=3 {{ $oneProduct->rating == 3 ? 'selected':'' }}>***</option>
                        <option value=2 {{ $oneProduct->rating == 2 ? 'selected':'' }}>**</option>
                        <option value=1 {{ $oneProduct->rating == 1 ? 'selected':'' }}>*</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Discount</td>
                <td>
                    <select name="discount" id="discount">
                        <option value="" {{ $oneProduct->discount_id == null ? 'selected':'' }}>Tidak ada</option>
                        @foreach($indexDiscounts as $discount)
                            <option value={{ $discount->id_discount }} {{ $discount->id_discount == $oneProduct->discount_id ? 'selected':'' }}>{{ $discount->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Categories</td>
                <td>
                    <select name="category" id="category">
                        @foreach($indexCategories as $category)
                            <option value={{ $category->id_category }} {{ $category->id_category == $oneProduct->category_id ? 'selected':'' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>