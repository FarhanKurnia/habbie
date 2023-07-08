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
            <form action="" class="flex flex-col space-y-6 pb-6">
                @csrf
                <input type="text" placeholder="Full Name"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <input type="email" placeholder="Email"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <input type="number" placeholder="Phone"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <input type="password" placeholder="Password"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <input type="password" placeholder="Password Confirm"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <button type="submit" class="btn btn-primary w-1/2 mx-auto rounded-full font-bold text-white">Register
                    Account</button>
            </form>

            <div class="p-4 bg-grey-secondary-50 rounded">
                <p>Sudah punya akun? <a href="{{ url('login') }}" class="font-bold text-pink-primary">Login Disini</a>
                </p>
            </div>
        </div>
    </div>
@endsection
