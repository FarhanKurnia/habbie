<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{--Categories--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="4">Categories using: $categories</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>slug</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($categories as $category)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @php
                            echo url("/test/categories/{$category->slug}"); 
                        @endphp
                    </td>                
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
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
                            echo url("/test/products/{$product->slug}"); 
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
    {{-- Testimonials--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Testimonials using: $testimonials</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>image</th>
                <th>profesi</th>
                <th>lokasi</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->image }}</td>
                    <td>{{ $testimonial->profesi }}</td>
                    <td>{{ $testimonial->lokasi }}</td>
                    <td>{{ $testimonial->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
    {{-- Reviews--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="6">Reviews using: $testimonials</th>
            </tr>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>rating</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>