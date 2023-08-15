@extends('layouts.admin-layout')

@section('title', 'Product Discount List')

@section('content')
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10 ">
        <livewire:admin.products-discount-table />
    </div>
@endsection