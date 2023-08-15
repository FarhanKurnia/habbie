@extends('layouts.admin-layout')
@php
    $title = isset($oneDiscount) ? 'Update Product Discount' : 'Create New Product Discount';
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
            action="{{ isset($oneDiscount) ? route('updateDiscounts', $oneDiscount->slug) : route('storeDiscounts') }}">
            @if (isset($oneDiscount))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif

            <div class="space-y-4 w-1/4">
                <p>{{ isset($oneDiscount) ? 'Change Discount Name' : 'Set Discount Name' }}</p>
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Discount Name" required
                    value="{{ isset($oneDiscount) ? $oneDiscount->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <p>{{ isset($oneDiscount) ? 'Change Discount Rule' : 'Set Discount Rule' }}</p>
                <input type="number" min='0' max='100' name="rule"
                    class="input input-bordered w-full bg-grey-secondary-50 " placeholder="Discount Rule (20)" required
                    value="{{ isset($oneDiscount) ? $oneDiscount->rule : old('rule') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <p>{{ isset($oneDiscount) ? 'Change Discount Description' : 'Set Discount Description' }}</p>
                <textarea class="textarea text-sm textarea-bordered w-full" placeholder="Description.." name="description">{{ isset($oneDiscount) ? $oneDiscount->description : old('description') }}</textarea>
                @error('description')
                    @include('components.public.partials.error-message', [
                        'message' => $message,
                    ])
                @enderror

                <div class="flex flex-col gap-2">
                    <p>{{ isset($oneDiscount) ? 'Change Discount Status' : 'Set Discount Status' }}</p>

                    <label class="rounded-md cursor-pointer flex items-center gap-2">
                        <input type="radio" class="radio checked:bg-pink-primary" name="status"
                            value="active"
                            {{ isset($oneDiscount) && $oneDiscount->status === 'active' ? 'checked' : '' }}
                            required />
                        <p>Active</p>
                    </label>

                    <label class="rounded-md cursor-pointer flex items-center gap-2">
                        <input type="radio" class="radio checked:bg-pink-primary" name="status"
                            value="non-active"
                            {{ isset($oneDiscount) && $oneDiscount->status === 'non-active' ? 'checked' : '' }}
                            required />
                        <p>Non Active</p>
                    </label>
                </div>

                <button type="submit" value="Proses"
                    class="btn btn-primary text-white">{{ isset($oneDiscount) ? 'Update' : 'Publish' }}</button>
            </div>
        </form>
    </div>
@endsection
