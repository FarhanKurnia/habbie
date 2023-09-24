@extends('layouts.admin-layout')
@php
    $title = 'Set Term Reseller';
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
        <form class="grid grid-cols-4 gap-2 my-6" method="POST" enctype="multipart/form-data" action="{{ route('setTermReseller') }}">
            @csrf
            @method('PATCH')

            <div class="col-span-3 space-y-4">

                <p class="text-pink-primary">Set Reseller Information</p>
                <textarea name="information" id="editor-information">{{ old('information') }}</textarea>
                @error('information')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <p class="text-pink-primary">Set Reseller Term</p>
                <textarea name="term" id="editor-term">{{ old('term') }}</textarea>
                @error('term')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">Update</button>
            </div>
        </form>

    </div>

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-term'), {
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
                editor.setData('{!! isset($term_reseller) ? $term_reseller->term : '' !!}');
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor-information'), {
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
                editor.setData('{!! isset($term_reseller) ? $term_reseller->information : '' !!}');
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
