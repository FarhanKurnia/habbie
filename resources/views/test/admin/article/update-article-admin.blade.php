<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateArticles',$oneArticle->slug) }}" method="POST">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Article</th>
            </tr>
            <tr>
                <td>title</td>
                <td><input class="form-control" type="text" name="title" value="{{ old('title', $oneArticle->title) }}" required></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input class="form-control" type="text" name="image" value="{{ old('image', $oneArticle->image) }}"></td>
            </tr>
            <tr>
                <td>post</td>
                <td><input class="form-control" type="text" name="post" value="{{ old('post', $oneArticle->post) }}"required></td>
            </tr>
            <tr>
                <td>user_id</td>
                <td><input class="form-control" type="text" name="user_id" value="{{ old('user_id', $oneArticle->user_id) }}"required></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>