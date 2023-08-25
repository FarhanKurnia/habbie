<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- form update -->
    <form action="{{ route('updateReviews',$review->id_review) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table border="1">
            <tr>
                <th colspan="10">Form Update Review</th>
            </tr>
            <tr>
                <td>name</td>
                <td><input class="form-control" type="text" name="name" value="{{ old('name', $review->name) }}" required></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>
                    <select name="rating" id="rating">
                        <option value=5 {{ $review->rating == 5 ? 'selected':'' }}>*****</option>
                        <option value=4 {{ $review->rating == 4 ? 'selected':'' }}>****</option>
                        <option value=3 {{ $review->rating == 3 ? 'selected':'' }}>***</option>
                        <option value=2 {{ $review->rating == 2 ? 'selected':'' }}>**</option>
                        <option value=1 {{ $review->rating == 1 ? 'selected':'' }}>*</option>
                    </select>
                </td>                
            </tr>
            <tr>
                <td>description</td>
                <td><input class="form-control" type="text" name="description" value="{{ old('description', $review->description) }}"required></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
</html>