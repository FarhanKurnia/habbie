@extends('layouts.base-layout')

@section('title', 'Register to Habbie')

@section('content')
    <div class="container mx-auto py-14">
        @include('components.public.partials.title', [
            'title' => 'Daftar Akun',
            'align' => 'center',
            'color' => 'grey',
        ])

        <div class="lg:w-1/3 mx-auto px-6 lg:px-0">
            <form action="{{ route('registerProcess') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col space-y-6 pb-6">
                {{ csrf_field() }}
                <input type="text" placeholder="Full Name" name="name" required
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('password') border-danger @enderror" />
                @error('name')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="email" placeholder="Email" name="email" required
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('email') border-danger @enderror" />
                @error('email')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="password" placeholder="Password" name="password" required
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('password') border-danger @enderror" />
                @error('password')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                <input type="password" placeholder="Password Confirm" name="password_confirmation" required
                    class="bg-grey-secondary-50 input w-full rounded-full border-1 @error('password') border-danger @enderror" />
                @error('password_confirmation')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror

                {!! NoCaptcha::display() !!}
                {!! NoCaptcha::renderJs() !!}
                @error('g-recaptcha-response')
                    @include('components.public.partials.error-message', ['message' => $message])
                @enderror
                
                <button type="submit" value="Proses"
                    class="btn btn-primary w-1/2 mx-auto rounded-full font-bold text-white">Register
                    Account</button>
            </form>

            <div class="p-4 bg-grey-secondary-50 rounded">
                <p>Sudah punya akun? <a href="{{ url('login') }}" class="font-bold text-pink-primary">Login Disini</a>
                </p>
            </div>
        </div>
    </div>
@endsection
