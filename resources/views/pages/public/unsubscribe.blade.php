@extends('layouts.base-layout')

@section('title', 'Unsubscribe')
@section('content')
    <div class="container mx-auto py-14">
        <div class="text-center bg-grey-secondary-50 rounded-md p-10">
            <img class="h-40 mx-auto p-6 opacity-30" src="{{ url('storage/img/unsubscribe.png') }}" alt="unsubscribe email">
            <h3 class="font-bold text-xl">Unsubscribe Email</h3>

            <p>{{$response}} <a href="{{ url('/') }}">Habbie</a>.</p>
            {{-- <a href="" class="flex justify-center py-2">
                <button class="btn btn-sm btn-primary rounded-full font-bold text-white text-md ">Unsubscribe Now!</button>
            </a> --}}
        </div>
    </div>
@endsection
