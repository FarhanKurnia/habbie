@extends('layouts.admin-layout')

@section('title', 'Product List')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">
        <livewire:admin.products-table />
    </div>
@endsection
