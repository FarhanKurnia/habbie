@extends('layouts.base-layout')

@section('title', 'Cart')
@section('content')

    <div class="mx-auto px-6 pt-4 lg:px-0">
        <livewire:cart-list />
    </div>
@endsection
