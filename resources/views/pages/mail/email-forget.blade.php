@extends('layouts.base-email-layout')
@section('title', $data['title'])
@section('content')
    <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 18px">{{ $data['title'] }}</h3>
    </div>

    <div style="padding-top: 4px; padding-bottom: 4px;">
        <p>Hi Mom Bie,<br>
        Berikut adalah kode otp yang bisa kamu gunakan.<br>
        </p>
        <div style="width:100%; text-align: center;">
            <strong>{{$data['otp']}}</strong>
        </div>
        <p>
            Kamu dapat memasukan kode OTP dan email pada halaman <a style=" font-style: italic;" href="{{ $data['url'] }}">lupa password</a> berikut<br>
        </p>
        <p>
            Sekian, terima kasih,<br>
            Best Regards<br>
            Admin Habbie
        </p>
    </div> 
@endsection
