<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
{{-- Categories--}}
    <table border="1">
        <thead>
            <tr>
                <th colspan="11">Categories: $indexCategories</th>
            </tr>
            <tr>
                <th>No</th>
                <th>icon</th>
                <th>name</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = '1';
            @endphp
            @foreach($indexCategories as $category)
                <tr>
                    <td>{{ $no++}}</td>
                    <td><p style="text-align:center;"><img src="{{ url($category->icon) }}" alt="{{ $category->icon }}" style="width:50px;height:50px;"></p></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{route('showCategories',$category->slug)}}">Show </a>
                        <a href="{{route('editCategories',$category->slug)}}">Edit </a>
                        <a href="{{route('deleteCategories',$category->slug)}}">Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
Halaman : {{ $indexCategories->currentPage() }} <br/>
Jumlah Data : {{ $indexCategories->total() }} <br/>
Data Per Halaman : {{ $indexCategories->perPage() }} <br/>
{{ $indexCategories->links() }}
</body>
</html>