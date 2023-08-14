<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {{-- Users--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Users: $users</th>
            </tr>
            <tr>
                <th>No</th>
                <th>customer_id</th>                
                <th>name</th>                
                <th>email</th>
                <th>role_id</th>                
                <th>email_verified_at</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $user->customer_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>
                        <a href="{{route('showUsers',$user->customer_id)}}">Show </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $users->currentPage() }} <br/>
Jumlah Data : {{ $users->total() }} <br/>
Data Per Halaman : {{ $users->perPage() }} <br/>
{{ $users->links() }}
</body>
</html>