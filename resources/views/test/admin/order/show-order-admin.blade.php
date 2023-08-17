<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Invoice</th>
            </tr>
            <tr>
                <th>invoice</th>
                <td>#{{ $order->invoice }}</td>
            </tr>
            <tr>
                <th>name</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>phone</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>address</th>
                <td>{{ $order->address.', '.$order->subdistrict.', '.$order->city.', '.$order->province.' '.$order->postal_code}}</td>
            </tr>
            <tr>
                <th>status</th>
                <td>{{ $order->status_order}} [{{ $order->status_payment}}]</td>
            </tr>
            <tr>
                <th>shipping</th>
                <td>{{ $order->shipping_code.' '.$order->shipping_service }}</td>
            </tr>
            <tr>
                <th>shipping_value</th>
                <td>Rp. {{ $order->shipping_value }}</td>
            </tr>
            <tr>
                <th>sub_total</th>
                <td>Rp. {{ $order->sub_total }}</td>
            </tr>
            <tr>
                <th>total</th>
                <td>Rp. {{ $order->total }}</td>
            </tr>
            <tr>
                <th>resi</th>
                @if ($order->resi)
                    <td>{{$order->resi}}</td>
                @else
                    <td> - </td>
                @endif
            </tr>
        </thead>
    </table>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Order Product</th>
            </tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Discount Price</th>
                <th>Sub Total Price</th>
                <th>Total Price</th>
                {{-- <th>Action</th> --}}

            </tr>
        </thead>
        @foreach($order->orderproduct as $index=>$product)
            <tr>
                
                   
                    <td>{{$order->orderproduct[$index]->product->name}}</td> 
                    <td>{{$order->orderproduct[$index]->qty}}</td>
                    <td>Rp. {{$order->orderproduct[$index]->price}}</td>
                    {{-- discount name --}}
                    @if($order->orderproduct[$index]->discount_id)
                        <td>{{$order->orderproduct[$index]->discount->name}}</td>
                    @else
                        <td> - </td>
                    @endif
                    {{-- discount price --}}
                    @if($order->orderproduct[$index]->discount_price == 0)
                        <td> - </td>
                    @else
                        <td>Rp. {{$order->orderproduct[$index]->discount_price}}</td>
                    @endif
                    <td>Rp. {{$order->orderproduct[$index]->sub_total_price}}</td>
                    <td>Rp. {{$order->orderproduct[$index]->total_price}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Payment</th>
            </tr>
                <th>VA Number</th>
                <th>Payment Type</th>
                <th>Bank</th>
                <th>Transaction ID</th>
                <th>Transaction Time</th>
                <th>Transaction Status</th>

            </tr>
        </thead>
        @foreach($payments as $payment)
            <tr>
                <td>{{$payment->va_number}}</td>        
                <td>{{$payment->payment_type}}</td>                                  
                <td>{{$payment->bank}}</td>   
                <td>{{$payment->transaction_id}}</td>                                     
                <td>{{$payment->created_at}}</td>                    
                <td>{{$payment->transaction_status}}</td>      
            </tr>
        @endforeach
        </tbody>
    </table>
<br>
{{-- update resi --}}
@if($order->resi == null && $order->status_order == 'process')
    <a href="{{route('editResi',$order->invoice)}}">Process </a>
@endif
</body>
</html>