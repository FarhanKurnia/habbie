@extends('layouts.admin-layout')

@php
    $title = isset($oneProduct) ? 'Update New Product' : 'Create New Product';
@endphp
@section('title', $title)

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">
        <h1 class="text-2xl text-grey">{{ $title }}</h1>
        <form class="grid grid-cols-4 gap-2 my-6" method="POST"
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
                                        @foreach ($indexDiscounts as $item)
                                            <label class="rounded-md cursor-pointer flex items-center gap-2">
                                                <input type="radio" class="radio radio-xs checked:bg-pink-primary"
                                                    name="discount" value="{{ $item->id_discount }}"
                                                    {{ isset($oneProduct) && $oneProduct->discount->id_discount === $item->id_discount ? 'checked' : '' }}
                                                    required />
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
                                    <span>
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
                                    </span>

                                    <span>
                                        <p class="text-xs mb-2">Set Product Weight (gram)</p>
                                        <input type="number" name="weight"
                                            class="input input-bordered w-full bg-grey-secondary-50 text-xs"
                                            placeholder="Weight" min="0" required
                                            value="{{ isset($oneProduct) ? $oneProduct->weight : old('weight') }}">
                                        @error('stock')
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
                                    @error('stock')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </span>
                                <span>
                                    <p class="text-xs mb-2">Write Product Story</p>
                                    <textarea class="textarea text-sm textarea-bordered w-full" placeholder="Story..">{{ isset($oneProduct) ? $oneProduct->story : old('story') }}</textarea>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="mx-2 flex flex-col gap-4">
                <button type="submit" value="Proses"
                    class="btn btn-primary text-white ">{{ isset($oneProduct) ? 'Update' : 'Publish' }}</button>
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
                    <input type="file" id="product-image"
                        class="my-4 file-input file-input-xs file-input-bordered w-full max-w-xs" />
                </div>
            </div>
        </form>
    </div>

    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');

        @if (isset($oneProduct))
            CKEDITOR.instances.editor.setData('{{ $oneProduct->description }}');
        @endif
    </script>
@endsection
