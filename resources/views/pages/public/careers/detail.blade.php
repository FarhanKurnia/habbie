@extends('layouts.base-layout')

@section('title', $career->title)
@section('content')

    @php
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $career->updated_at)->format('l, d F Y');
    @endphp

    <div class="container mx-auto py-10 divide-y-2 divide-grey-secondary">
        <div class="pb-10">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-pink-primary">{{ $career->title }}</h1>
                <small class="text-grey-secondary">{{ $date }}</small>
            </div>
    
            <div class="image lg:w-5/6 py-6 lg:mx-auto flex justify-center items-center">
                <img src="{{ url($career->image) }}" alt="$career->title" class="w-full lg:rounded-lg">
            </div>
    
            <div class="content lg:w-3/4 lg:mx-auto mx-10 ">
                {!! $career->post !!}
            </div>
        </div>
    </div>

@endsection
