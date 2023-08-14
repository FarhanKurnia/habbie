<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateOffers',$oneOffer->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Offer</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $oneOffer->name) }}" required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><p style="text-align:center;"><img src="{{ url($oneOffer->image) }}" alt="{{ $oneOffer->image }}" style="width:50px;height:50px;"></p></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input class="form-control" type="text" name="description" value="{{ old('description', $oneOffer->description) }}"required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option value="active" {{ $oneOffer->status == "active" ? 'selected':'' }}>active</option>
                        <option value="non-active" {{ $oneOffer->status == "non-active" ? 'selected':'' }}>non-active</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>Product</td>
                <td>
                    <select name="product" id="product">
                        <option value="" {{ $oneOffer->product_id == null ? 'selected':'' }}>Tidak ada</option>
                        @foreach($indexProducts as $product)
                            <option value={{ $product->id_product }} {{ $product->id_product == $oneOffer->product_id ? 'selected':'' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>image</td>
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