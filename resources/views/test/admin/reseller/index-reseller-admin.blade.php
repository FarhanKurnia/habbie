<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Resellers--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Resellers</th>
            </tr>
            <tr>
                {{-- 'name','seller_id', 'email', 'gender', 'phone', 'birth_date', 'identity_card', 'status', 'address', 'province', 'city','subdistrict','postal_code' --}}

                <th>No</th>
                <th>Reseller_id</th>   
                {{-- <th>Identity Card</th>              --}}
                <th>Name</th>                
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>                
                <th>Birth Date</th>
                <th>Status</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($resellers as $reseller)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $reseller->reseller_id }}</td>
                    {{-- <td>{{ $reseller->identity_card }}</td> --}}
                    <td>{{ $reseller->name }}</td>
                    <td>{{ $reseller->email }}</td>
                    <td>{{ $reseller->phone }}</td>
                    <td>{{ $reseller->address }}, {{ $reseller->subdistrict }}, {{ $reseller->city }}, {{ $reseller->province }} {{ $reseller->postal_code }}</td>
                    <td>{{ $reseller->gender }}</td>
                    <td>{{ $reseller->birth_date }}</td>
                    <td>{{ $reseller->status }}</td>
                    <td>
                        @if($reseller->status == 'active')
                            {{-- active --}}
                            <a href="{{route('updateResellers',$reseller->reseller_id)}}">non-activate </a>
                        @else
                            {{-- request/non-active --}}
                            <a href="{{route('updateResellers',$reseller->reseller_id)}}">activate </a>    
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $resellers->currentPage() }} <br/>
Jumlah Data : {{ $resellers->total() }} <br/>
Data Per Halaman : {{ $resellers->perPage() }} <br/>
{{ $resellers->links() }}
</body>
</html>