@extends('layouts.base-layout')

@section('title', 'Careers')
@section('content')


    <div class="container mx-auto pt-14 px-6">
        @include('components.public.partials.title', [
            'title' => 'Careers',
            'align' => 'left',
            'color' => 'pink-primary',
        ])
        <div class="space-y-14">
            @foreach ($careers as $index => $career)
                @include('components.public.partials.content-list-careers', ['data' => $career, $index])
            @endforeach
        </div>

        <div class="p-4 pagination">
            {{ $careers->links() }}
        </div>
    </div>

    <div class="h-64 bg-pink-primary overflow-y-hidden">
        <img src="{{ asset('storage/img/slides/img-slide.jpg') }}" alt="" class="object-cover opacity-25 h-full w-full">
    </div>



@endsection
