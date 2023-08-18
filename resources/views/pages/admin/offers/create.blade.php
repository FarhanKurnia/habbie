@extends('layouts.admin-layout')
@php
    $title = isset($oneOffer) ? 'Update Offer' : 'Create New Offer';
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
            action="{{ isset($oneOffer) ? route('updateOffers', $oneOffer->slug) : route('storeOffers') }}">
            @if (isset($oneOffer))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif
            <div class="col-span-3 space-y-4">
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Offers Title" required value="{{ isset($oneOffer) ? $oneOffer->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="description" id="editor">{{ old('description') }}</textarea>

                <div class="bg-pink-primary p-4 rounded">
                    <h4 class="text-white font-bold mb-4">Choose Product</h4>
                    <div class="bg-grey-secondary-50 p-4 rounded h-96 overflow-y-auto flex flex-col gap-4">
                        @foreach ($indexProducts as $item)
                            <div class="rounded-lg p-4 bg-pink-primary bg-opacity-10 flex items-center">
                                <div class="w-14 px-auto">
                                    <input type="radio" class="radio checked:bg-pink-primary" name="product"
                                        value="{{ $item->id_product }}"
                                        {{ isset($oneOffer) && $oneOffer->product_id === $item->id_product ? 'checked' : '' }}
                                        required />
                                </div>
                                <div class="flex gap-8 items-center">
                                    @php
                                        $normalPrice = $item->price;
                                        
                                        if ($item->discount_id) {
                                            $discount = $item->discount->rule;
                                            $discountPrice = ($discount / 100) * $normalPrice;
                                            $normalPrice -= $discountPrice;
                                        }
                                        
                                    @endphp
                                    <img class="h-24" src="{{ url($item->image) }}" alt="{{ $item->name }}">
                                    <div>
                                        <span class="flex text-lg font-bold gap-2">{{ $item->name }}
                                            {!! $item->discount_id ? '<p class="text-pink-primary">' . $item->discount->name . '</p>' : '' !!}</span>
                                        <span class="flex gap-2">
                                            {!! $item->discount_id
                                                ? \App\Helpers\CurrencyFormat::data($normalPrice) . '<s>' . \App\Helpers\CurrencyFormat::data($item->price) . '</s>'
                                                : \App\Helpers\CurrencyFormat::data($item->price) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="mx-2 flex flex-col gap-4">
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneOffer) ? 'Update' : 'Publish' }}</button>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <p class="text-gray-secondary">Set Status</p>
                    @php
                        $status = [
                            'active' => 'Active',
                            'non-active' => 'Non Active',
                        ];
                    @endphp

                    <div class="my-4 flex flex-col gap-4">
                        @foreach ($status as $index => $item)
                            <label class="rounded-md cursor-pointer flex items-center gap-2">
                                <input type="radio" class="radio radio-xs checked:bg-pink-primary" name="status"
                                    value="{{ $index }}"
                                    {{ isset($oneOffer) && $oneOffer->status === $index ? 'checked' : '' }} required />
                                <p class="text-xs">{{ $item }}</p>
                            </label>
                        @endforeach
                    </div>

                </div>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <label class="cursor-pointer" for="product-image">
                        <p class="text-gray-secondary">Image</p>
                        @if (isset($oneOffer))
                            <img class="h-48 mx-auto m-8" src="{{ url($oneOffer->image) }}" alt="{{ $oneOffer->name }}">
                        @endif
                    </label>
                    <input type="file" id="offer-image" name="image"
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
                    editor.setData('{!! isset($oneOffer) ? $oneOffer->description : '' !!}');
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
@endsection
