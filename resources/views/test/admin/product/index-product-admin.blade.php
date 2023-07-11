<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Products depend on category--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Products depend on category: $indexProducts</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>category_id</th>
                <th>image</th>
                <th>description</th>
                <th>price</th>
                <th>stock</th>
                <th>weight</th>
                <th>rating</th>
                <th>discount_id</th>
                <th>slug</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($indexProducts as $product)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->image }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @php
                        // handle discount
                            $checkDiscount = $product->discount_id;
                            $normalPrice = $product->price;
                            if($checkDiscount != null){
                                $discount = $product->discount['rule'];
                                $discountPrice = ($discount/100)*$normalPrice;
                                $discountPrice = $normalPrice-$discountPrice;
                                echo "<s>"."Rp. ".$normalPrice."</s>"."  Rp. ".$discountPrice;
                            } else{
                                echo "Rp. ".$normalPrice = $product->price;
                            }
                        @endphp 
                    </td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->rating }}</td>
                    @if ($product->discount_id != null)
                    <td>{{ $product->discount->rule }}%</td>
                    @else
                    <td>Null</td>
                    @endif
                    <td>{{ $product->slug }}</td>
                    <td>
                        <a href="{{route('showProducts',$product->slug)}}">Show </a>
                        <a href="{{route('editProducts',$product->slug)}}">Edit </a>
                        <a href="{{route('deleteProducts',$product->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $indexProducts->currentPage() }} <br/>
Jumlah Data : {{ $indexProducts->total() }} <br/>
Data Per Halaman : {{ $indexProducts->perPage() }} <br/>
{{ $indexProducts->links() }}
</body>
</html>