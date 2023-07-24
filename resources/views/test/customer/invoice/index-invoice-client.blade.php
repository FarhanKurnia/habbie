<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Invoices--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Invoice using: $invoices</th>
            </tr>
            <tr>
                <th>No</th>
                <th>invoice</th>
                <th>status</th>
                <th>shipping</th>
                <th>total</th>
                <th>payment</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $invoice->invoice }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->shipping_code.' '.$invoice->shipping_service }}</td>
                    <td>Rp. {{ $invoice->total }}</td>
                    @if ($invoice->payment)
                        <td>{{$invoice->payment->bank}}</td>
                    @else
                        <td> null </td>
                    @endif
                    <td>
                        <a href="{{route('showInvoiceClient',$invoice->invoice)}}">Show </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
</body>
</html>