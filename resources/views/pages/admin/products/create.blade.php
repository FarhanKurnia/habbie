@extends('layouts.admin-layout')

@section('title', 'Create New Product')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">
        <h1 class="text-2xl text-grey">Add New Product</h1>
        <div class="grid grid-cols-4 gap-4 my-6">
            <div class="col-span-3 space-y-4">
                <input type="text" name="name" class="input input-bordered w-full bg-grey-secondary-50 "
                    placeholder="Product Name" required>
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <textarea name="description" id="editor"></textarea>

                <div class="bg-pink-primary p-4 rounded">
                    <h4 class="text-white font-bold mb-4">Manage Product</h4>
                    <div class="grid grid-cols-4">
                        <div class="bg-grey-secondary-50 rounded-l">
                            <ul class="menu rounded-box menu-manage-product space-y-2">
                                <li><a class="active" href="#general">General</a></li>
                                <li><a href="#inventory">Inventory</a></li>
                                <li><a href="#story">Story</a></li>
                            </ul>

                        </div>
                        <div class="col-span-3 p-4 bg-white rounded-r">
                            <div id="general" class="tab-content flex flex-col gap-4">
                                <span>
                                    <p class="text-xs mb-2">Set Product Price</p>
                                    <input type="number" name="price"
                                        class="input input-bordered w-full bg-grey-secondary-50 text-xs" placeholder="Price"
                                        required>
                                    @error('price')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </span>
                                <span>
                                    <p class="text-xs mb-2">Choose Product Discount</p>

                                </span>
                            </div>

                            <div id="inventory" class="tab-content">
                                <p class="text-xs mb-2">Inventory</p>
                            </div>

                            <div id="story" class="tab-content">
                                <p class="text-xs mb-2">Story</p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="p-4 bg-white border border-grey-secondary rounded">
                <p class="text-gray-secondary">Choose Category</p>

                <div class="my-4 flex flex-col gap-4">
                    <label class="rounded-md cursor-pointer flex items-center gap-2">
                        <input type="radio" class="radio radio-xs checked:bg-pink-primary" value="test" required />
                        <p class="text-xs">Category Title</p>
                    </label>

                    <label class="rounded-md cursor-pointer flex items-center gap-2">
                        <input type="radio" class="radio radio-xs checked:bg-pink-primary" value="test" required />
                        <p class="text-xs">Category Title</p>
                    </label>

                    <label class="rounded-md cursor-pointer flex items-center gap-2">
                        <input type="radio" class="radio radio-xs checked:bg-pink-primary" value="test" required />
                        <p class="text-xs">Category Title</p>
                    </label>
                </div>

            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor');
    </script>
@endsection
