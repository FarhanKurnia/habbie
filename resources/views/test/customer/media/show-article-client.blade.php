<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- random recommendation--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Random one recommendation using: $randomRecommendation</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>category_id</th>
                <th>image</th>
                <th>description</th>
                <th>price</th>
                <th>stock</th>
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
            @foreach($randomRecommendation as $product)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_id }}</td>
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
                            <td>{{ $product->discount_id }}</td>
                    @else
                        <td>Null</td>
                    @endif
                    <td>{{ $product->slug }}</td>
                    <td>
                        @php
                            echo url("/product/{$product->slug}"); 
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
    {{-- Top Articles--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">articles using: $oneArticle</th>
            </tr>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>image</th>
                <th>post</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $oneArticle->title }}</td>
                <td>{{ $oneArticle->image }}</td>
                <td>{{ $oneArticle->post }}</td>
                <td>{{ $oneArticle->slug }}</td>
            </tr>
        </tbody>
    </table>
<br>
    {{-- Related Articles--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Reviews using: $latestArticles</th>
            </tr>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>image</th>
                <th>post</th>
                <th>slug</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($latestArticles as $latestArticle)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $latestArticle->title }}</td>
                    <td>{{ $latestArticle->image }}</td>
                    <td>{{ $latestArticle->post }}</td>
                    <td>{{ $latestArticle->slug }}</td>
                    <td>
                        @php
                            echo url("/media/{$latestArticle->slug}"); 
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>