@extends('layouts.base-email-layout')
@section('title', $data['title'])
@section('content')
    <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 18px">{{ $data['title'] }}</h3>
    </div>

    <div style="padding-top: 4px; padding-bottom: 4px;">
        <p>Hi {{ $data['name'] }}!,</p>
        <p>Terima kasih telah melakukan registrasi melalui Habbie. Untuk melakukan verifikasi akun, anda dapat menekan
            tombol berikut. <br>
        </p>
        <div style="width:100%; text-align: center;">
            <a href="{{ $data['url'] }}" target="_blank">
                <button class="cta-button">Verifikasi
                    Akun</button>
            </a>
        </div>
        <p>
            Atau akses melalui <a style=" font-style: italic;" href="{{ $data['url'] }}">link</a> berikut<br>
        </p>
        <p>
            Sekian, terima kasih,<br>
            Best Regards<br>
            Admin Habbie
        </p>
    </div> 

@endsection
