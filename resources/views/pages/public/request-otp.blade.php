@extends('layouts.base-layout')

@section('title', 'Request OTP')

@section('content')
    <div class="container mx-auto py-14">

        @include('components.public.partials.title', [
            'title' => 'Request OTP',
            'align' => 'center',
            'color' => 'grey',
        ])

        @if (session()->has('loginError'))
            {{ session('loginError') }}
        @endif

        <div class="lg:w-1/3 mx-auto px-6 lg:px-0">
            <form action="{{ route('requestOTPProcess') }}" class="flex flex-col space-y-6 pb-6" method="POST">
                {{ csrf_field() }}

                <input type="email" placeholder="Email"
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('email') border-danger @enderror"
                    name="email" autofocus required />
                @error('email')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <button type="submit" value="Proses"
                    class="btn btn-primary w-1/3 mx-auto rounded-full font-bold text-white">Submit</button>
            </form>
        </div>
    </div>
@endsection
