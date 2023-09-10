@extends('layouts.admin-layout')
@section('title', 'Reseller Detail')

@php
    
    $status = ['request', 'active', 'non-active'];
    
    $gender = ['pria', 'wanita'];
    
@endphp
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

        <h1 class="text-2xl text-grey">Reseller Data</h1>

        <div class="my-6 flex flex-col gap-6">
            <form class="bg-white p-4 rounded grid grid-cols-1 lg:grid-cols-3 gap-10" method="POST"
                enctype="multipart/form-data" action="{{ route('updateResellers', $reseller->reseller_id) }}">
                @csrf
                @method('PATCH')
                <div class="col-span-2">
                    <div>
                        <span class="text-grey">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Reseller id</td>
                                        <td>
                                            <input type="text" name="reseller_id"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->reseller_id : old('reseller_id') }}"
                                                disabled>
                                            @error('reseller_id')
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
                                                value="{{ isset($reseller) ? $reseller->name : old('name') }}" required>
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
                                                value="{{ isset($reseller) ? $reseller->email : old('email') }}" disabled>
                                            @error('email')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td class="flex gap-4">
                                            @foreach ($gender as $item)
                                                <label class="rounded-md cursor-pointer flex items-center gap-2">
                                                    <input type="radio" class="radio radio-xs checked:bg-pink-primary"
                                                        name="gender" value="{{ $item }}"
                                                        {{ isset($reseller) && $reseller->gender === $item ? 'checked' : '' }}
                                                        required />
                                                    <p>{{ ucfirst($item) }}</p>
                                                </label>
                                            @endforeach
                                            @error('gender')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Birth of Date</td>
                                        <td>
                                            <input type="date" name="birth_date"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->birth_date : old('birth_date') }}"
                                                required>
                                            @error('birth_date')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td class="flex gap-4">
                                            @foreach ($status as $item)
                                                <label class="rounded-md cursor-pointer flex items-center gap-2">
                                                    <input type="radio" class="radio radio-xs checked:bg-pink-primary"
                                                        name="status" value="{{ $item }}"
                                                        {{ isset($reseller) && $reseller->status === $item ? 'checked' : '' }}
                                                        required />
                                                    <p>{{ ucfirst($item) }}</p>
                                                </label>
                                            @endforeach
                                            @error('status')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>
                                            <input type="number" name="phone"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->phone : old('phone') }}" required>
                                            @error('phone')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Identity Card Number (KTP)</td>
                                        <td>
                                            <input type="number" name="identity_card"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->identity_card : old('identity_card') }}"
                                                required>
                                            @error('identity_card')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <input type="text" name="address"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->address : old('address') }}"
                                                required>
                                            @error('address')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Province</td>
                                        <td>
                                            <input type="text" name="province"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->province : old('province') }}"
                                                required>
                                            @error('province')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>
                                            <input type="text" name="city"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->city : old('city') }}" required>
                                            @error('city')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Subdistrict</td>
                                        <td>
                                            <input type="text" name="subdistrict"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->subdistrict : old('subdistrict') }}"
                                                required>
                                            @error('subdistrict')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Postal Code</td>
                                        <td>
                                            <input type="number" name="postal_code"
                                                class="input input-bordered w-full bg-grey-secondary-50 "
                                                value="{{ isset($reseller) ? $reseller->postal_code : old('postal_code') }}"
                                                required>
                                            @error('postal_code')
                                                @include('components.public.partials.error-message', [
                                                    'message' => $message,
                                                ])subdistrict
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" value="Proses" class="my-4 btn btn-primary text-white ">Update </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
