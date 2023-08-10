<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- One Product--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="10">Show one product using: $oneProduct</th>
            </tr>
            <tr>
                <th>image</th>
                <th>name</th>
                <th>category_id</th>
                <th>description</th>                
                <th>story</th>
                <th>price</th>
                <th>stock</th>
                <th>rating</th>
                <th>discount_id</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p style="text-align:center;"><img src="{{ url($oneProduct->image) }}" alt="{{ $oneProduct->image }}" style="width:20px;height:50px;"></p></td>
                <td>{{ $oneProduct->name }}</td>
                <td>{{ $oneProduct->category->name }}</td>
                <td>{{ $oneProduct->description }}</td>
                <td>{{ $oneProduct->story }}</td>
                <td>
                    @php
                        // handle discount
                        $checkDiscount = $oneProduct->discount_id;
                        $normalPrice = $oneProduct->price;
                        if($checkDiscount != null){
                            $discount = $oneProduct->discount['rule'];
                            $discountPrice = ($discount/100)*$normalPrice;
                            $discountPrice = $normalPrice-$discountPrice;
                            echo "<s>"."Rp. ".$normalPrice."</s>"."  Rp. ".$discountPrice;
                        } else{
                            echo "Rp. ".$normalPrice = $oneProduct->price;
                        }
                    @endphp 
                </td>                    
                <td>{{ $oneProduct->stock }}</td>
                <td>{{ $oneProduct->rating }}</td>
                @if ($oneProduct->discount_id != null)
                    <td>{{ $oneProduct->discount_id }}</td>
                @else
                    <td>Tidak ada</td>
                @endif
                <td>{{ $oneProduct->slug }}</td>
                </tr>
        </tbody>
    </table>
<br>
</body>
</html>