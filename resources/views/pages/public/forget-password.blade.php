@extends('layouts.base-layout')

@section('title', 'Forget Password')

@section('content')
    <div class="container mx-auto py-14">

        @include('components.public.partials.title', [
            'title' => 'Forget Password',
            'align' => 'center',
            'color' => 'grey',
        ])

        @if (session()->has('loginError'))
            {{ session('loginError') }}
        @endif

        
        <div class="lg:w-1/3 mx-auto px-6 lg:px-0">
            @if (session()->has('info'))
                <div class="bg-teal-shadow rounded p-4 font-bold">
                    <p>{{ session()->get('info') }}</p>
                </div>
            @endif
            <form action="{{ route('forgetPasswordProcess') }}" class="flex flex-col space-y-6 pb-6" method="POST">
                {{ csrf_field() }}
                <input type="email" placeholder="Email"
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('email') border-danger @enderror"
                    name="email" autofocus required />
                @error('email')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="password" placeholder="Kode OTP"
                    class="bg-grey-secondary-50 input border-1 @error('otp') border-danger @enderror w-full rounded-full"
                    name="otp" required />
                @error('otp')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="password" placeholder="Buat Password Baru"
                    class="bg-grey-secondary-50 input border-1 @error('password') border-danger @enderror w-full rounded-full"
                    name="password" required />
                @error('password')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <button type="submit" value="Proses"
                    class="btn btn-primary w-1/3 mx-auto rounded-full font-bold text-white">Submit</button>

            </form>
        </div>

    </div>
@endsection
