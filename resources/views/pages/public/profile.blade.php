@extends('layouts.base-layout')

@section('title', 'Edit Profile')

@section('content')

    <div class="container mx-auto py-14">
        <div class="lg:w-1/3 mx-auto px-6 lg:px-0">
            @if (session()->has('error'))
                <livewire:alert :message="session('error')" :background="'bg-danger'" />
            @endif

            @if (session()->has('success'))
                <livewire:alert :message="session()->get('success')" :background="'bg-green'" />
            @endif
            <form class="bg-white p-4 rounded" method="POST" enctype="multipart/form-data"
                action="{{ route('updateProfileClient') }}">
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
