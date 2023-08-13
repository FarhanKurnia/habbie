@extends('layouts.admin-layout')
@php
    $title = isset($oneProduct) ? 'Update Product Category' : 'Create New Product Category';
@endphp
@section('title', $title)

@section('content')
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10 ">
        <h1 class="text-2xl text-grey">{{ $title }}</h1>
        <form class="grid grid-cols-1 gap-2 my-6" method="POST" enctype="multipart/form-data">
            <div class="space-y-4">
                <input type="text" name="name" class="input input-bordered w-1/3 bg-grey-secondary-50 "
                    placeholder="Category Name" required value="{{ isset($oneProduct) ? $oneProduct->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <div>
                    <p>Choose Category icon</p>
                    <input type="file" id="product-image" name="image"
                        class="my-4 file-input file-input-bordered w-full max-w-xs" />
                    @error('image')
                        @include('components.public.partials.error-message', [
                            'message' => $message,
                        ])
                    @enderror
                </div>


                <button type="submit" value="Proses"
                    class="btn btn-primary text-white">{{ isset($oneProduct) ? 'Update' : 'Publish' }}</button>
            </div>
        </form>
    </div>
@endsection
