@extends('layouts.base-layout')

@section('title', 'Membership')
@section('content')

    <div class="container mx-auto px-6 lg:px-0 py-10">
        <div class="lg:w-1/2">
            <h3 class="text-xl pb-10 lg:pb-0">Join Membership</h3>
            <livewire:form-membership />
        </div>
    </div>

@endsection
