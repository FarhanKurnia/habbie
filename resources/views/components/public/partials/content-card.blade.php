{{-- <div class="card lg:w-96 bg-base-100 shadow-xl"> --}}
<div class="card lg:w-96 bg-base-100 shadow-xl">
    <figure class="px-10 pt-10 w-1/2 mx-auto">
        <img src="{{ asset('storage/img/icons_about/' . $srcImg) }}" alt="" />
    </figure>
    <div class="card-body items-center text-center">
        <p>{{$content}}</p>
        {{-- <div class="card-actions pt-10">
            <button class="bg-transparent font-bold text-lg">Learn More</button>
        </div> --}}
    </div>
</div>
