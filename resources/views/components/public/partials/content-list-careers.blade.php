<div class="grid lg:grid-cols-2 gap-6 items-top">
    <a href="{{ route('showCareerClient', $data['slug']) }}">
        <div class="bg-grey-secondary-50 rounded relative">
                <img src="{{ $data['image'] }}" class="w-full rounded-xl" />
        </div>
        <div>
            <h3 class="text-2xl font-bold text-pink-primary lg:py-4">{{ $data['title'] }}</h3>
            <p>{!! $data['excerpt'] !!}</p>
            <a href="{{ route('showCareerClient', $data['slug']) }}">
                <button class="btn btn-primary btn-sm rounded-full font-bold text-white my-6">See Details</button>
            </a>
        </div>
    </a>
</div>