@extends('layouts.base-email-layout')
@section('title', $data['title'])
@section('content')
    @include('components.mail.partials.title', [
        'title' => $data['title'],
        'align' => 'left',
        'color' => 'grey',
    ])

    <div class="py-4 text-sm">
        <p>Hi {{ $data['name'] }}!,</p>
        <p>Terima kasih telah melakukan registrasi melalui Habbie. Untuk melakukan verifikasi akun, anda dapat menekan
            tombol berikut. <br>
        </p>
        <div class="flex justify-center">
            <a href="{{ $data['url'] }}" target="_blank">
                <button class="btn btn-sm btn-primary rounded font-bold my-2 text-white text-xs">Verifikasi
                    Akun</button>
            </a>
        </div>
        <p>
            Atau akses melalui <a class="italic underline font-bold" href="{{ $data['url'] }}">link</a> berikut<br>
        </p>
        <p>
            Sekian, terima kasih,<br>
            Best Regards<br>
            Farhan Kurnia
        </p>
    </div>

@endsection
