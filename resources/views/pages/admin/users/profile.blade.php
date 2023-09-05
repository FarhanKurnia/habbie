@extends('layouts.admin-layout')
@section('title', 'Profile')
@section('content')
    <div class="mx-auto max-w-screen-2xl h-screen p-4 md:p-6 2xl:p-10">

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

        <div class="my-6 flex flex-col gap-6">
            <form class="bg-white p-4 rounded grid grid-cols-1 lg:grid-cols-3 gap-10" method="POST"
                enctype="multipart/form-data" action="{{ route('updateProfile') }}">
                @csrf
                @method('PATCH')
                <div class="col-span-2">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer id</td>
                                <td>
                                    <input type="text" name="customer_id"
                                        class="input input-bordered w-full bg-grey-secondary-50 "
                                        value="{{ isset($user) ? $user->customer_id : old('customer_id') }}" disabled>
                                    @error('customer_id')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name"
                                        class="input input-bordered w-full bg-grey-secondary-50 "
                                        value="{{ isset($user) ? $user->name : old('name') }}" required>
                                    @error('name')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" name="email"
                                        class="input input-bordered w-full bg-grey-secondary-50 "
                                        value="{{ isset($user) ? $user->email : old('email') }}" disabled>
                                    @error('email')
                                        @include('components.public.partials.error-message', [
                                            'message' => $message,
                                        ])
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" value="Proses" class="my-4 btn btn-primary text-white ">Update </button>
                </div>
            </form>
        </div>
    </div>
@endsection
