@extends('layouts.admin-layout')
@php
    $title = isset($reviews) ? 'Update Review' : 'Create New Review';
    $ratingData = [1, 2, 3, 4, 5];
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
        <form class="grid grid-cols-4 gap-2 my-6" method="POST" enctype="multipart/form-data"
            action="{{ isset($review) ? route('updateReviews', $review->id_review) : route('storeReviews') }}">
            @if (isset($review))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif
            <div class="col-span-3 space-y-4">
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Name" required value="{{ isset($review) ? $review->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="description" id="editor">{{ old('description') }}</textarea>

                <select name="rating" class="select select-bordered w-full max-w-xs" required>
                    @foreach ($ratingData as $item)
                        <option {{ isset($review) && $review->rating == $item ? 'selected' : '' }}
                            value="{{ $item }}">
                            {{ $item }}</option>
                    @endforeach
                </select>

                @error('rating')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
            </div>
            <div class="mx-2 flex flex-col gap-4">
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneTestimoni) ? 'Update' : 'Publish' }}</button>

            </div>
        </form>
        <style>
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
        </style>

        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            '|',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'undo',
                            'redo'
                        ]
                    },
                })
                .then(editor => {
                    editor.setData('{!! isset($review) ? $review->description : '' !!}');
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
@endsection
