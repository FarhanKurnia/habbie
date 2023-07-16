@component('mail::message')
# {{ $data['title'] }}

Hi!, <br>
Kode OTP kamu sebagai berikut ya.<br>
## {{$data['otp']}}
Kamu dapat memasukan kode OTP dan email pada halaman lupa password {{$data['url']}}. <br>
<br>
<br>
Sekian, terima kasih,<br>
Best Regards<br>
Farhan Kurnia<br>

@endcomponent