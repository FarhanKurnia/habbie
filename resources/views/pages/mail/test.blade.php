@extends('layouts.base-email-layout')
@section('content')
    {{-- {{ $data }} --}}
    {{-- <img src="{{ $image }}" alt="Company Logo"> --}}


    {{-- verification email --}}
    {{-- <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 18px">{{ $data }}</h3>
    </div>

    <div style="padding-top: 4px; padding-bottom: 4px;">
        <p>Hi {{ $data }}!,</p>
        <p>Terima kasih telah melakukan registrasi melalui Habbie. Untuk melakukan verifikasi akun, anda dapat menekan
            tombol berikut. <br>
        </p>
        <div style="width:100%; text-align: center;">
            <a href="{{ $data }}" target="_blank">
                <button class="cta-button">Verifikasi
                    Akun</button>
            </a>
        </div>
        <p>
            Atau akses melalui <a style=" font-style: italic;" href="{{ $data }}">link</a> berikut<br>
        </p>
        <p>
            Sekian, terima kasih,<br>
            Best Regards<br>
            [Tim Habbie]
        </p>
    </div> --}}
    {{-- 
    @php
        $user = [
            'name' => 'Bagus Gandhi',
        ];

        $offer = [
            'name' => 'Buy 3 get 1 free',
            'image' => 'storage/img/offers/sample-offers-01.png',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ipsum commodo, consequat.',
            'product' => 'tea-green-honey',
        ];

    @endphp --}}

    {{-- Offer --}}

    {{-- <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 24px">Special Offer</h3>
    </div>

    <div>
        <div style="padding-top: 4px; padding-bottom: 4px;">
            <p style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000"><strong>Hai
                    Mom Bie</strong><br />
                Khusus untuk kamu, saat ini Habbie memiliki <b><i>Special Offers</i></b> yang sayang banget untuk kamu
                lewatkan
                loh!
            </p>
        </div>
        <div style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000">
            <img style="width: 100%" src="{{ url($offer['image']) }}" alt="{{ $offer['name'] }}">
            <h3 style="text-align: center;">{{ $offer['name'] }}</h3>
            <p>{!! $offer['description'] !!}</p>

            <div style="width:100%; text-align: center;">
                <a href="{{ url('/products/'.$offer->product->slug)}}" target="_blank">
                    <button class="cta-button">
                        Lihat Produk
                    </button>
                </a>
            </div>

            <p>
                Tunggu apa lagi! Kunjungi Habbie Store sekarang dan temukan penawaran menarik lain yang kami siapkan hanya
                untuk
                kamu.
                <a href="{{ url('offers') }}" target="_blank" class="text-pink-primary italic underline font-bold">List
                    Spesial
                    Offers</a>
            </p>
            <small style="color:dimgray">
                Klik <i><a href=" {{ url('/unsubscribe') }}">link</a></i> berikut ntuk berhenti berlangganan email penawaran
                Habbie
            </small>
        </div>
    </div> --}}


    {{-- invoice --}}
    {{-- <div class="py-4 text-sm">
        <div class="py-4" style="padding-top: 4px; padding-bottom: 4px;">
            <p style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000"> Terima kasih
                sudah melakukan pemesanan. Berikut adalah informasi pesanan dengan nomor invoice
                <strong>#{{$orderData['invoice']}}</strong>. Untuk selanjutnya, silahkan dapat melakukan pembayaran sesuai dengan
                metode pembayaran yang telah dipilih.
            </p>
        </div>

        <p
            style="border-top:solid 2px #d2d1d1;font-size:1;margin:0px auto;width:100%;padding-top: 10px;padding-bottom: 10px;">
        </p>

        <table class="table" style="width: 100%;">
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Nama</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['name'] }}</td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Email</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['email'] }}</td>
            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Phone</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['phone'] }}</td>

            </tr>
            <tr>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                    Alamat</td>
                <td
                    style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000;font-weight: bold">
                    {{ $orderData['customer']['address'] }}, {{ $orderData['customer']['subdistrict'] }},
                    {{ $orderData['customer']['city'] }}, {{ $orderData['customer']['province'] }},
                    {{ $orderData['customer']['postal_code'] }}</td>

            </tr>
        </table>
        <br>
        <br>
        <table class="table list" style="width: 100%;">
            <thead style="background-color: #fae6e5;">
                <tr>
                    <th style="padding: 8px;">Order Detail</th>
                    <th>QTY</th>
                    <th>Item Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderData['products'] as $item)
                    <tr>
                        <td style="padding:8px; display: flex; justify-content: center; align-items: center;">
                            <img src="{{ url($item['image']) }}" style="height: 40px;padding: 8px;">
                            <a>{{ $item['name'] }}</a>
                        </td>
                        <td style="padding:8px;">
                            <p>{{ $item['quantity'] }}</p>
                        </td>
                        <td style="padding:8px;">
                            @php
                                $price = isset($item['discount_id']) ? $item['sub_total_price'] : $item['price'];
                            @endphp
                            <p>{{ \App\Helpers\CurrencyFormat::data($price) }}</p>
                        </td>
                        <td style="padding:8px;">
                            <p>{{ \App\Helpers\CurrencyFormat::data($item['total_price']) }}</p>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding:8px;">
                        <p>Biaya Ongkir</p>
                    </td>
                    <td style="padding:8px;">
                        <p>{{ \App\Helpers\CurrencyFormat::data($orderData['shipping']['value']) }}</p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding:8px;">
                        <p>Total</p>
                    </td>
                    <td style="padding:8px; color:#de596d;">
                        <p>{{ \App\Helpers\CurrencyFormat::data($orderData['subtotal'] + $orderData['shipping']['value']) }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Catatan<br>
            {!! $orderData['customer']['note'] !!}
        </p>
        <br>
        <br>
        <div>
            Salam hangat,<br>
            Admin Habbie
        </div>
    </div> --}}

    {{-- Order --}}

    {{-- <div style="width:100%; text-align: center;">
        <h3 style="font-weight: bold; font-size: 20px">
            {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel'
                ? 'Maaf Order Anda Gagal Kami Proses'
                : 'Terima Kasih, Order sudah kami terima' }}
        </h3>
    </div>

    <div>
        <div style="padding-top: 4px; padding-bottom: 4px;">

            <h3 style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5;color:#000000">Order
                #{{ $order[0]['invoice'] }}</h3>

            <p>
                {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'Mohon maaf order Anda gagal untuk kami proses. Silahkan hubungi kami untuk informasinya' : 'Order Anda telah kami terima, saat ini sedang kami lakukan proses dan selanjutnya akan dikirim sesuai estimasi pengiriman.' }}<br></br>
                Berikut untuk detail order Anda:
            </p>
        </div>

        <div>
            <div>
                <table style="width: 100%;">
                    @foreach ($order[0]->orderproduct as $item)
                        <tr>
                            <td style="width:25%;text-align:center;">
                                <img src="{{ url($item->product->image) }}" style="height: 80px;padding: 8px;">
                            </td>
                            <td>
                                <div>
                                    <a href=""
                                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#de586c;font-weight: bold">
                                        {{ $item->product->name }}
                                    </a><br></br>
                                    <span>
                                        @if (isset($item['discount_id']))
                                            <s>
                                                {{ \App\Helpers\CurrencyFormat::data($item['total_price'] + $item['discount_price']) }}
                                            </s>
                                        @endif

                                        {{ \App\Helpers\CurrencyFormat::data($item['total_price']) }}
                                    </span><br></br>
                                    <small>{{ ' x ' . $item['qty'] }}</small>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>

            <table class="table" style="width: 100%;">
                <tr>
                    <td style="width:25%;">
                        <p>Subtotal</p>
                    </td>
                    <td>
                        {{ \App\Helpers\CurrencyFormat::data($order[0]['total']) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Pengiriman<br></br>
                        <small>
                            {{ $order[0]['shipping_code'] }} {{ $order[0]['shipping_service'] }}
                        </small><br></br>
                        <small>{{ $order[0]['shipping_etd'] }} hari</small>
                    </td>
                    <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['shipping_value']) }}</td>
                </tr>
                <tr>
                    <td>
                        <p>Total</p>
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#de586c;font-weight: bold">
                        {{ \App\Helpers\CurrencyFormat::data($order[0]['total'] + $order[0]['shipping_value']) }}
                    </td>
                </tr>
            </table>

        </div>

        <div>
            <h3>Informasi Pemesan</h3>
            <table class="table" style="width: 100%;">

                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Nama
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {{ $order[0]['name'] }}
                    </td>
                </tr>

                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Email
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {{ $order[0]['email'] }}
                    </td>
                </tr>

                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Phone
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {{ $order[0]['phone'] }}
                    </td>
                </tr>

                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Alamat Pengiriman
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {{$order[0]['address']}}, {{$order[0]['subdistrict']}}, {{$order[0]['city']}}, {{$order[0]['province']}}, {{$order[0]['postal_code']}}
                    </td>
                </tr>
                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Note</td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {!! $order[0]['note'] !!}
                    </td>
                </tr>
                <tr>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        Pembayaran
                    </td>
                    <td
                        style="font-family:Lato,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.5;color:#000000;font-weight: bold;width:25%;">
                        {{ $order[0]->payment->bank }}
                    </td>
                </tr>
            </table>
        </div>
    </div> --}}

    {{-- <div class="py-4">
        <h3 class="font-bold text-xl">Order #{{$order[0]['invoice']}}</h3>


        <p class="text-sm">
            {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'Mohon maaf order Anda gagal untuk kami proses. Silahkan hubungi kami untuk informasinya' : 'Order Anda telah kami terima, saat ini sedang kami lakukan proses dan selanjutnya akan dikirim sesuai estimasi pengiriman.' }}
            </br> Berikut untuk detail order Anda:</p>

        <div class="flex flex-col my-4">
            @foreach ($order[0]->orderproduct as $item)
                <div class="grid grid-cols-4 items-center p-4 {{ $item->status_order === 'failed' || $item->status_order === 'cancel' ?  'bg-danger' : 'bg-green'  }} bg-opacity-5 my-2">
                    <div>
                        <img class="h-14 mx-auto" src="{{ url($item->product->image) }}" alt="{{ $item->product->name }}">
                    </div>
                    <div class="col-span-3 flex flex-col">
                        <a href="#" class="font-bold text-sm hover:text-pink-primary">{{ $item->product->name }}</a>
                        <span class="flex gap-2">
                            @if (isset($item['discount_id']))
                                <s class="text-xs text-grey">
                                    {{ \App\Helpers\CurrencyFormat::data($item['total_price']+$item['discount_price']) }}
                                </s>
                            @endif
                            <p class="text-xs font-bold text-grey">
                                {{\App\Helpers\CurrencyFormat::data($item['total_price']) }}
                            </p>
                            <p class="text-xs">{{ ' x ' . $item['qty'] }}</p>
                        </span>
                    </div>
                </div>
            @endforeach
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['total']) }}</td>
                </tr>
                <tr>
                    <td>
                        <p>Pengiriman</p>
                        <span class="text-xs text-grey">
                            <p>{{$order[0]['shipping_code']}} {{$order[0]['shipping_service']}}</p>
                            <p>{{$order[0]['shipping_etd']}} hari</p>
                        </span>
                    </td>
                    <td>{{ \App\Helpers\CurrencyFormat::data($order[0]['shipping_value']) }}</td>

                </tr>
                <tr class="text-white {{ $order[0]['status_order'] === 'failed' || $order[0]['status_order'] === 'cancel' ? 'bg-danger' : 'bg-green' }}">
                    <td>Total</td>
                    <td class="font-bold">{{ \App\Helpers\CurrencyFormat::data($order[0]['total']+$order[0]['shipping_value']) }}</td>
                </tr>
            </table>
        </div>

    </div> --}}


    {{-- <div class="py-4">
        <h3 class="font-bold">Informasi Pemesan</h3>
        <table class="table">
            <tr>
                <td>Nama</td>
                <td>{{$order[0]['name']}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$order[0]['email']}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$order[0]['phone']}}</td>
            </tr>
            <tr>
                <td>Alamat Pengiriman</td>
                <td>{{$order[0]['address']}}, {{$order[0]['subdistrict']}}, {{$order[0]['city']}}, {{$order[0]['province']}}, {{$order[0]['postal_code']}}</td>
            </tr>
            <tr>
                <td>Note</td>
                <td>{!! $order[0]['note'] !!}</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>{{ $order[0]->payment->bank }}</td>
            </tr>
        </table>
    </div> --}}
@endsection
