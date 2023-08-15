@extends('layouts.admin-layout')
@php
    $title = isset($oneCategory) ? 'Update Product Category' : 'Create New Product Category';
@endphp
@section('title', $title)

@section('content')
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10 ">

        @if (session()->has('success'))
            <div class="p-4 bg-teal rounded mb-4">
                {!! session('success') !!}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="p-4 bg-danger rounded mb-4 text-white">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-2xl text-grey">{{ $title }}</h1>
        <form class="grid grid-cols-1 gap-2 my-6" method="POST" enctype="multipart/form-data"
            action="{{ isset($oneCategory) ? route('updateCategories', $oneCategory->slug) : route('storeCategories') }}">
            @if (isset($oneCategory))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif

            <div class="space-y-4 w-1/4">
                <p>{{ isset($oneCategory) ? 'Change Category Name' : 'Set Category Name' }}</p>
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Category Name" required
                    value="{{ isset($oneCategory) ? $oneCategory->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <div>
                    <label class="cursor-pointer" for="product-image">
                        @if (isset($oneCategory))
                            <img class="h-30 border-2 border-pink-primary p-4 rounded-lg  mx-auto m-8" src="{{ url($oneCategory->icon) }}"
                                alt="{{ $oneCategory->name }}">
                        @endif
                    </label>
                    <p>{{ isset($oneCategory) ? 'Change Category icon' : 'Choose Category icon' }}</p>
                    <input type="file" id="product-image" name="icon"
                        class="my-4 file-input file-input-bordered w-full max-w-xs" />
                    @error('image')
                        @include('components.public.partials.error-message', [
                            'message' => $message,
                        ])
                    @enderror
                </div>


                <button type="submit" value="Proses"
                    class="btn btn-primary text-white">{{ isset($oneCategory) ? 'Update' : 'Publish' }}</button>
            </div>
        </form>
    </div>
@endsection
