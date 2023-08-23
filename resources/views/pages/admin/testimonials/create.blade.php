@extends('layouts.admin-layout')
@php
    $title = isset($oneTestimoni) ? 'Update Testimoni' : 'Create New Testimoni';
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
            action="{{ isset($oneTestimoni) ? route('updateTestimonials', $oneTestimoni->slug) : route('storeTestimonials') }}">
            @if (isset($oneTestimoni))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif
            <div class="col-span-3 space-y-4">
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Name" required value="{{ isset($oneTestimoni) ? $oneTestimoni->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="description" id="editor">{{ old('description') }}</textarea>

                <input type="text" name="profesi" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Profesi" required value="{{ isset($oneTestimoni) ? $oneTestimoni->profesi : old('profesi') }}">
                @error('profesi')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="text" name="lokasi" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Location" required value="{{ isset($oneTestimoni) ? $oneTestimoni->lokasi : old('lokasi') }}">
                @error('lokasi')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
            </div>
            <div class="mx-2 flex flex-col gap-4">
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneTestimoni) ? 'Update' : 'Publish' }}</button>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <label class="cursor-pointer" for="testimoni-image">
                        <p class="text-gray-secondary">Image</p>
                        @if (isset($oneTestimoni))
                            <img class="h-48 mx-auto m-8" src="{{ url($oneTestimoni->image) }}"
                                alt="{{ $oneTestimoni->name }}">
                        @endif
                    </label>
                    <input type="file" id="testimoni-image" name="image"
                        class="my-4 file-input file-input-xs file-input-bordered w-full max-w-xs" />
                    @error('image')
                        @include('components.public.partials.error-message', [
                            'message' => $message,
                        ])
                    @enderror
                </div>
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
                    editor.setData('{!! isset($oneTestimoni) ? $oneTestimoni->description : '' !!}');
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
@endsection
