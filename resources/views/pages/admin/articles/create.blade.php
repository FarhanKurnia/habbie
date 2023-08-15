@extends('layouts.admin-layout')

@php
    $title = isset($oneArticle) ? 'Update Article' : 'Create New Article';
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
            action="{{ isset($oneArticle) ? route('updateArticles', $oneArticle->slug) : route('storeArticles') }}">

            @if (isset($oneArticle))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif

            <div class="col-span-3 space-y-4">
                <input type="text" name="title" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Title" required value="{{ isset($oneArticle) ? $oneArticle->title : old('title') }}">
                @error('title')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="post" id="editor" >{{ old('post') }}</textarea>
                @error('upload')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
            </div>

            <div class="mx-2 flex flex-col gap-4">

                {{-- submit button --}}
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneArticle) ? 'Update' : 'Publish' }}</button>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">

                    <div class="my-4 flex flex-col gap-4">

                        <p class="text-gray-secondary">Excerpt</p>
                        <textarea class="textarea text-sm textarea-bordered w-full" placeholder="Excerpt.." name="excerpt">{{ isset($oneArticle) ? strip_tags($oneArticle->excerpt,'<>') : old('excerpt') }}</textarea>
                        @error('excerpt')
                            @include('components.public.partials.error-message', [
                                'message' => $message,
                            ])
                        @enderror
                    </div>

                </div>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <label class="cursor-pointer" for="product-image">
                        <p class="text-gray-secondary">Article Image</p>
                        @if (isset($oneArticle))
                            <img class="h-48 mx-auto m-8" src="{{ url($oneArticle->image) }}"
                                alt="{{ $oneArticle->title }}">
                        @endif
                    </label>
                    <input type="file" id="product-image" name="image"
                        class="my-4 file-input file-input-xs file-input-bordered w-full max-w-xs" />
                    @error('image')
                        @include('components.public.partials.error-message', [
                            'message' => $message,
                        ])
                    @enderror
                </div>

            </div>
        </form>

    </div>
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 360px;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route("imageUpload")."?_token=".csrf_token() }}'
                }
            })
            .then(editor => {
                editor.setData('{!! isset($oneArticle) ? $oneArticle->post : '' !!}');
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
