@extends('layouts.base-layout')

@section('title', 'Login to Habbie')

@section('content')
    <div class="container mx-auto py-14">
        @include('components.public.partials.title', [
            'title' => 'Masuk',
            'align' => 'center',
            'color' => 'grey',
        ])

        <div class="lg:w-1/3 mx-auto px-6 lg:px-0">
            @if (session()->has('loginError'))
                <div class="p-2 bg-danger w-full rounded">
                    <p class="text-white">{{ session('loginError') }}</p>
                </div>
            @endif

            @if (session()->has('info'))
                <div class="bg-teal-shadow rounded p-4 font-bold">
                    <p>{{ session()->get('info') }}</p>
                </div>
            @endif

            <form action="{{ route('authenticate') }}" class="flex flex-col space-y-6 pb-6" method="POST">
                {{ csrf_field() }}
                <input type="email" placeholder="Email"
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('email') border-danger @enderror"
                    name="email" required />
                @error('email')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
                <input type="password" placeholder="Password"
                    class="bg-grey-secondary-50 input border-1 @error('password') border-danger @enderror w-full rounded-full"
                    name="password" required />
                @error('password')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-row px-4 gap-3 items-center">
                        <input type="checkbox" {{ old('remember') ? 'checked="checked"' : '' }} class="checkbox"
                            name="remember" />
                        <p class="text-sm text-grey">Remember me</p>
                    </div>

                    <div>
                        <a href="{{ url('/request-otp') }}"><p class="text-sm text-pink-primary">Forget Password</p></a>
                    </div>
                </div>
                <button type="submit" value="Proses"
                    class="btn btn-primary w-1/3 mx-auto rounded-full font-bold text-white">Login</button>
            </form>

            <div class="p-4 bg-grey-secondary-50 rounded">
                <p>Belum punya akun? <a href="{{ url('register') }}" class="font-bold text-pink-primary">Daftar Disini</a>
                </p>
            </div>
        </div>

    </div>
@endsection
