@extends('layouts.base-layout')

@section('title', 'Email Verification Status')
@section('content')
    <div class="container mx-auto py-14">
        @include('components.public.partials.title', [
            'title' => 'Email Verification Status',
            'align' => 'center',
            'color' => 'grey',
        ])

        <div class="p-4 rounded bg-teal-shadow">
            <p class="font-bold">{{ $log }} silahkan <a class=" text-pink-primary" href="{{ url('/login') }}">Login</a></p>
        </div>
    </div>

@endsection
