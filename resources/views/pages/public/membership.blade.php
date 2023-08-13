@extends('layouts.base-layout')

@section('title', 'Membership')
@section('content')

    @php
        $contents = [
            [
                'name' => 'Ibu Dewi',
                'image' => 'storage/img/mitras/mitra_ivanka.jpg',
                'profesi' => 'Ibu Rumah Tangga',
                'lokasi' => 'Jakarta Selatan',
                'description' => 'Alhamdulillah sejak saya bergabung menjadi reseller Habbie sekitar setahun lalu, saya jadi punya pengasilan tambahan yang lumayan. Awalnya penasaran coba-coba pakai Habbie sendiri, ternyata teman-teman banyak yang minta. Jadi saya mulai coba jadi reseller dan keuntungannya bisa lebih dari gaji suami hehe',
            ],
            [
                'name' => 'Ibu Ida',
                'image' => 'storage/img/mitras/mitra_marisa.jpg',
                'profesi' => 'Enterpreneur',
                'lokasi' => 'Semarang',
                'description' => 'Saya bergabung menjadi reseller Habbie sejak delapan bulan lalu, Alhamdulillah setiap bulan bisa repeat order sampai 2 kali atau bisa lebih kalau lagi banyak ibu yang bersalin. Customer saya kebanyakan ibu muda dan banyak juga yang beli Habbie untuk kado kelahiran gitu.',
            ],
            [
                'name' => 'Ibu Wulan',
                'image' => 'storage/img/mitras/mitra_melysa.jpg',
                'profesi' => 'Guru',
                'lokasi' => 'Tasikmalaya',
                'description' => 'Puji Tuhan setelah menjadi reseller Habbie saya punya usaha sampingan yang menguntungkan. Variannya banyak dan wanginya enak-enak, saya juga pakai sendiri untuk anak-anak, sekaligus promo ke temen dan keluarga kalau lagi pada kumpul.',
            ],
            [
                'name' => 'Bapak Bimo',
                'image' => 'storage/img/mitras/mitra_zaitunalhamid.png',
                'profesi' => 'Pengusaha',
                'lokasi' => 'Lampung',
                'description' => 'Banyak keuntungan menjadi reseller Habbie, CS-nya ramah dan dikasih tester pula, harga yang ditawarkan untuk reseller juga lebih menguntungkan.',
            ],
            [
                'name' => 'Ibu Erni',
                'image' => 'storage/img/mitras/mitra_zatira.png',
                'profesi' => 'Pemilik Online Shop',
                'lokasi' => 'Surabaya',
                'description' => 'Awalnya saya dapet iklan tentang Habbie, lalu mulai kepo dan cari info gitu. Terus saya coba beli yang paket 7 dulu dan menawarkan ke temen-temen, lama kelamaan banyak yang nanya juga, jadi saya mulai coba beli paket reseller, sedikit demi sedikit sampai sekarang alhamdulillah bisa repeat order dengan paket yang lebih banyak.',
            ],
        ];
    @endphp
    <div class="container mx-auto pb-10">
        <img class="w-full object-cover" src="{{ url('storage/img/slides/slide-4.png') }}" alt="Membership Program">
        <div class="pt-14">
            <div class="text-center">
                <h3 class="font-bold text-2xl text-pink-primary">Mitra Habbie</h3>
            </div>
            @include('components.public.partials.testimonial-slider', ['contents' => $contents])
        </div>
    </div>
    <div class="py-10 bg-pink-bloosom">
        <div class="px-6 text-center lg:w-1/2 lg:mx-auto mx-6flex flex-col gap-4">
            <h3 class="font-bold text-2xl text-pink-primary py-5">Mengapa Menjadi Reseller Habbie</h3>
            <p class= "text-justify pb-6">Untung banget loh Bie, dengan menjadi reseller, maka untuk harga product perbotol menjadi Rp 45.500. Selain itu, terdapat <strong>DISKON KHUSUS</strong> lain untuk Reseller Habbie yaitu: setiap pembelian 50-249 botol akan mendapatkan diskon sebesar 4% sehingga harga tiap product menjadi 43.700 per botol dan setiap pembelian >250 botol maka akan mendapatkan diskon sebesar 7% sehingga harga product menjadi Rp. 42.300 per botol. Harga juga sudah termasuk PPN 11% ya 😊</p>
            {{-- <button class="btn btn-sm btn-primary mx-auto rounded-full font-bold text-white ">Term & Condition</button> --}}
        </div>
    </div>
    <div class="grid grid-cols-5 overflow-x-hidden h-64">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonials/testimonial_dhea.jpeg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonials/testimonial_nisa.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonials/testimonial_natia.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonials/testimonial_malina.jpg') }}" alt="">
        <img class="w-full object-cover h-64" src="{{ url('storage/img/testimonials/testimonial_hansel.jpg') }}" alt="">
    </div>
    <div class="container lg:mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-4 my-10 lg:py-10 items-center">
        <div class="flex flex-col gap-4">
            <h3 class="font-bold text-2xl text-pink-primary">Syarat Reseller Habbie</h3>
            <p>1. Mengorder paket reseller minimal 50 botol<br>2. Mengirimkan identitas berupa KTP &/ NPWP<br>
                3. Mengisi identitas dan informasi sosial media baik toko online maupun offline
            </p>
        </div>
        <div>
            <img class="w-full lg:w-full lg:object-cover lg:h-80" src="{{ url('storage/img/mitras/mitra_thumbnail2.JPG') }}" alt="">
        </div>
    </div>
    <div class="container mx-auto lg:bg-grey-secondary-50 p-10 rounded-lg my-10 text-center flex flex-col gap-4">
        <h3 class="font-bold text-2xl text-grey">Tunggu Apa Lagi, Mombie?</h3>
        <a href="{{ url('membership/join') }}">
            <button class=" btn btn-sm btn-primary mx-auto rounded-full font-bold text-white">Join Member Now!</button>
        </a>
    </div>

@endsection
