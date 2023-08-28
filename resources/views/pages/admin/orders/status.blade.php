@extends('layouts.admin-layout')

@php
    $title = "All Status: " . ucfirst($status)
@endphp
@section('title', $title)

@section('content')
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10 ">
        <livewire:admin.order-status-table :status="$status" />
    </div>
@endsection
