<ul class="flex flex-row p-2 z-20">
    <li>
        <ul class="flex flex-col">
            @foreach ($categories as $index => $category)
                @if ($index % 2 === 0)
                    <li><a href="{{ url('/products/categories/'. $category->slug) }}">{{ $category->name }}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
    <li>
        <ul class="flex flex-col">
            @foreach ($categories as $index => $category)
                @if ($index % 2 !== 0)
                    <li><a href="{{ url('/products/categories/'. $category->slug) }}">{{ $category->name }}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
</ul>
