<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="{{ route('search') }}" method="GET">
        <label><h2>Pencarian</h2></label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Masukan pencarian" required/>
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </form>
    <br>
    <br>
    @if(isset($result))
        @if($data_count >0)
            <table border="1">
                <tbody> 
                    @foreach($result as $res)
                        <tr>
                            <td> {{$res->name ? $res->name : $res->title}}
                            <td> {{$res->description ? $res->description : $res->excerpt}}
                            <td>
                                @if($res->name)
                                    <a href="{{route('products.show',$res->slug)}}">{{route('products.show',$res->slug)}}</a>
                                @else
                                    @if($res->categories == "article")
                                        <a href="{{route('showArticleClient',$res->slug)}}">{{route('showArticleClient',$res->slug)}}</a>
                                    @else
                                        <a href="{{route('showCareerClient',$res->slug)}}">{{route('showCareerClient',$res->slug)}}</a>
                                    @endif
                                @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3> Pencarian tidak ditemukan</h3>
        @endif
    @endif
</body>
</html>