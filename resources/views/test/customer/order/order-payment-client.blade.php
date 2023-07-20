<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Products depend on invoice--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Products depend on Invoice: $orderProducts</th>
            </tr>
            <tr>
                <th>No</th>
                <th>id_product</th>
                <th>name</th>
                <th>price</th>
                <th>discount price</th>
                <th>discount name</th>
                <th>sub total price</th>
                <th>qty</th>
                <th>total price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($orderProducts as $orderProduct)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $orderProduct->product->id_product}}</td>
                    <td>{{ $orderProduct->product->name }}</td>
                    <td>{{ $orderProduct->price }}</td>
                    <td>{{ $orderProduct->discount_price }}</td>
                    <td>
                        @php
                        // handle discount
                            $checkDiscount = $orderProduct->discount_id;
                            if($checkDiscount != null){
                                echo $orderProduct->discount->name;
                            } else{
                                echo "null";
                            }
                        @endphp 
                    </td>
                    <td>{{ $orderProduct->sub_total_price }}</td>
                    <td>{{ $orderProduct->qty }}</td>
                    <td>{{ $orderProduct->total_price }}</td>
                </tr>
            @endforeach
            <tr> 
                <td></td>
                <td colspan="7"> subtotal</td>
                <td colspan="11">{{$orderProducts[0]->order->sub_total}}</td>
            </tr>
            <tr> 
                <td></td>
                <td colspan="7"> biaya pengiriman</td>
                <td colspan="11">{{$orderProducts[0]->order->shipping_value}}</td>
            </tr>
            <tr> 
                <td></td>
                <td colspan="11">pengiriman {{$orderProducts[0]->order->shipping_code}} [{{$orderProducts[0]->order->shipping_service}}]</td>
            </tr>
            <tr> 
                <td></td>
                <td colspan="7"> total</td>
                <td colspan="11">{{$orderProducts[0]->order->total}}</td>
            </tr>
            <tr> 
                <td></td>
                <td colspan="7"> status pembayaran</td>
                <td colspan="11">{{$orderProducts[0]->order->status}}</td>
            </tr>
        </tbody>
    </table>
<br>
</body>
</html>