@extends('layouts.admin-layout')

@php
    $title = isset($oneProduct) ? 'Update New Product' : 'Create New Product';
@endphp
@section('title', $title)

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">

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
            action="{{ isset($oneProduct) ? route('updateProducts', $oneProduct->slug) : route('storeProducts') }}">
            @if (isset($oneProduct))
                @csrf
                @method('PATCH')
            @else
                {{ csrf_field() }}
            @endif
            <div class="col-span-3 space-y-4">
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Product Name" required value="{{ isset($oneProduct) ? $oneProduct->name : old('name') }}">
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="description" id="editor">{{ old('description') }}</textarea>

                <div class="bg-pink-primary p-4 rounded">
                    <h4 class="text-white font-bold mb-4">Manage Product</h4>
                    <div class="grid grid-cols-4">
                        <div class="bg-grey-secondary-50 rounded-l">
                            <ul class="menu rounded-box menu-manage-product space-y-2">
                                <li><a class="active" href="#general">General</a></li>
                                <li><a href="#inventory">Inventory</a></li>
                                <li><a href="#story">Rating & Story</a></li>
                            </ul>

                        </div>
                        <div class="col-span-3 p-4 bg-white rounded-r">
                            <div id="general" class="tab-content flex flex-col gap-4">
                                <p class="text-xs mb-2 text-pink-primary font-bold">General</p>
                                <span>
                                    <p class="text-xs mb-2">Set Product Price</p>
                                    <input type="number" name="price"
                                        class="input input-bordered w-full bg-grey-secondary-50 text-xs" placeholder="Price"
                                        min="0" required
                                        value="{{ isset($oneProduct) ? $oneProduct->price : old('price') }}">
                                    @error('price')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </span>
                                <span>
                                    <p class="text-xs mb-2">Choose Product Discount</p>
                                    <div class="my-4 flex flex-col gap-4">
                                        <label class="rounded-md cursor-pointer flex items-center gap-2">
                                            <input type="radio" class="radio radio-xs checked:bg-pink-primary"
                                                name="discount" value="{{ null }}"
                                                {{ isset($oneProduct) && !$oneProduct->discount ? 'checked' : '' }} />
                                            <span>
                                                <p class="text-sm font-bold">No Discount</p>
                                                <p class="text-xs">Set produk tidak pakai diskon</p>
                                            </span>
                                        </label>
                                        @foreach ($indexDiscounts as $item)
                                            <label class="rounded-md cursor-pointer flex items-center gap-2">
                                                <input type="radio" class="radio radio-xs checked:bg-pink-primary"
                                                    name="discount" value="{{ $item->id_discount }}"
                                                    {{ isset($oneProduct) && $oneProduct->discount?->id_discount === $item->id_discount ? 'checked' : '' }} />
                                                <span>
                                                    <p class="text-sm font-bold">{{ $item->name }}</p>
                                                    <p class="text-xs">{{ $item->description }}</p>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </span>
                            </div>

                            <div id="inventory" class="tab-content flex flex-col gap-4">
                                <p class="text-xs mb-2 text-pink-primary font-bold">Inventory</p>
                                <div class="grid grid-cols-2 gap-4">
                                    {{-- <span>
                                        <p class="text-xs mb-2">Set Product Stock</p>
                                        <input type="number" name="stock"
                                            class="input input-bordered w-full bg-grey-secondary-50 text-xs"
                                            placeholder="Stock" min="0" required
                                            value="{{ isset($oneProduct) ? $oneProduct->stock : old('stock') }}">
                                        @error('stock')
                                            @include('components.public.partials.error-message', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span> --}}

                                    <span>
                                        <p class="text-xs mb-2">Set Product Weight (gram)</p>
                                        <input type="number" name="weight"
                                            class="input input-bordered w-full bg-grey-secondary-50 text-xs"
                                            placeholder="Weight" min="0" required
                                            value="{{ isset($oneProduct) ? $oneProduct->weight : old('weight') }}">
                                        @error('weight')
                                            @include('components.public.partials.error-message', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span>
                                </div>

                            </div>

                            <div id="story" class="tab-content flex flex-col gap-4">
                                <p class="text-xs mb-2 text-pink-primary font-bold">Review & Story</p>
                                <span>
                                    <p class="text-xs mb-2">Set Product Rating</p>
                                    <input type="number" name="rating"
                                        class="input input-bordered w-full bg-grey-secondary-50 text-xs"
                                        placeholder="Rating (0 ~ 5)" min="0" max="5" required
                                        value="{{ isset($oneProduct) ? $oneProduct->rating : old('rating') }}">
                                    @error('rating')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </span>
                                <span>
                                    <p class="text-xs mb-2">Write Product Story</p>
                                    <textarea class="textarea text-sm textarea-bordered w-full" placeholder="Story.." name="story">{{ isset($oneProduct) ? $oneProduct->story : old('story') }}</textarea>
                                    @error('story')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </span>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="mx-2 flex flex-col gap-4">
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneProduct) ? 'Update' : 'Publish' }}</button>
                
                @if(isset($oneProduct))
                    <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                        <p class="text-gray-secondary">Status</p>
                        <div class="my-4">
                            <livewire:admin.toggle :productId="$oneProduct->id_product"/>
                        </div>
                    </div>
                @endif

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <p class="text-gray-secondary">Choose Category</p>

                    <div class="my-4 flex flex-col gap-4">
                        @foreach ($indexCategories as $item)
                            <label class="rounded-md cursor-pointer flex items-center gap-2">
                                <input type="radio" class="radio radio-xs checked:bg-pink-primary" name="category"
                                    value="{{ $item->id_category }}"
                                    {{ isset($oneProduct) && $oneProduct->category->id_category === $item->id_category ? 'checked' : '' }}
                                    required />
                                <p class="text-xs">{{ $item->name }}</p>
                            </label>
                        @endforeach
                    </div>

                </div>

                <div class="p-4 bg-white border border-grey-secondary rounded-lg">
                    <label class="cursor-pointer" for="product-image">
                        <p class="text-gray-secondary">Product Image</p>
                        @if (isset($oneProduct))
                            <img class="h-48 mx-auto m-8" src="{{ url($oneProduct->image) }}"
                                alt="{{ $oneProduct->name }}">
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
                editor.setData('{!! isset($oneProduct) ? $oneProduct->description : '' !!}');
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
