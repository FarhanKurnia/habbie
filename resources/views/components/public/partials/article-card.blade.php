<div class="p-4">
    <a href="{{ url('media/' . $articles['slug']) }}">
        <img class="py-2 rounded-xl" src="{{ $articles['image'] }}" alt="{{ $articles['title'] }}" />
        <h4 class="text-pink-primary font-bold text-xl py-2">{{ $articles['title'] }}</h4>
        <p>{{ $articles['excerpt'] }}</p>
        <a href="{{ url('media/' . $articles['slug']) }}" class="text-pink-primary italic">Read More</a>
    </a>
</div>
