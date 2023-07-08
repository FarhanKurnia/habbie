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
            <form action="" class="flex flex-col space-y-6 pb-6">
                @csrf
                <input type="email" placeholder="Email"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <input type="password" placeholder="Password"
                    class="bg-grey-secondary-50 input input-bordered w-full rounded-full" />
                <div class="flex flex-row px-4 gap-3">
                    <input type="checkbox" checked="checked" class="checkbox" />
                    <p class="text-sm text-grey">Remember me</p>
                </div>
                <button type="submit" class="btn btn-primary w-1/3 mx-auto rounded-full font-bold text-white">Login</button>
            </form>

            <div class="p-4 bg-grey-secondary-50 rounded">
                <p>Belum punya akun? <a href="{{ url('register') }}" class="font-bold text-pink-primary">Daftar Disini</a></p>
            </div>
        </div>

    </div>
@endsection
