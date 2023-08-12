@extends('layouts.base-layout')

@section('title', 'About us')
@section('content')
    @include('components.public.partials.hero-slider')

    <div class="container mx-auto py-14">
        @include('components.public.partials.title', [
            'title' => 'Apa itu Minyak Telon?',
            'align' => 'center',
            'color' => 'pink-primary',
        ])
        <div class="mx-6 lg:w-1/2 lg:mx-auto">
            <img class="pb-6" src="{{ asset('storage/img/slides/slide-6.png') }}" alt="minyak telon habbie">
            <p class="text-left">
                Dimulai tahun 2019, sebuah perusahaan yang berfokus pada produk berbasis Aromatic by Nature.
                Kompetensi inti kami adalah budaya dan teknologi yang kuat berbasis online.
                Dengan semangat kami sebagai generasi milenial, kami menyediakan produk dan brand unik yang memiliki nilai
                tambah bagi masyarakat.
                Love, Passion, Innovation, Customer Satisfaction, dan Family, adalah lima pilar nilai inti perusahaan kami.
                Tagline kami adalah "Delivering love, passion, and kindness."</p>
        </div>
    </div>

    <div class="bg-pink-bloosom">
        <div class="container mx-auto py-14">
            <div
                class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:items-center lg:gap-10 lg:justify-center m-6 lg:m-0">
                @include('components.public.partials.content-card', ['content' => 'Minyak kelapa yang terbaik adalah minyak yang diekstrak dari kelapa segar tanpa campuran bahan kimia. Minyak kelapa merupakan antioksidan yang baik karena mengandung senyawa phenolic. Minyak kelapa yang terkandung dalam campuran minyak telon memiliki khasiat untuk melembabkan kulit. Sifat antimikroba di dalam minyak telon juga memiliki kemampuan untuk melindungi kulit dari mikroorganisme yang menyebabkan infeksi dan gatal-gatal.'],
                ['srcImg' => 'icon_story1.png'])
                @include('components.public.partials.content-card', ['content' => 'Minyak adas merupakan minyak essensial yang diekstrak dari tanaman Adas. Tanaman Adas banyak ditemui di daerah timur tengah. Kandungan minyak adas di dalam minyak telon efektif untuk menyembuhkan perut kembung dan pilek akibat influenza.'],
                ['srcImg' => 'icon_story2.png'])
                @include('components.public.partials.content-card', ['content' => 'Minyak Kayu putih merupakan hasil penyulingan dari ranting dan daun segar pohon kayu putih. Sineol merupakan zat yang terkandung di dalam minyak kayu putih, zat inilah yang menimbulkan rasa hangat ketika kita mengoleskan minyak kayu putih ke tubuh kita. Sineol juga mampu untuk meredakan gatal-gatal akibat gigitan serangga.'],
                ['srcImg' => 'icon_story3.png'])
            </div>
        </div>
    </div>

    <div class="container mx-auto py-14 ">
        @include('components.public.partials.title', [
            'title' => 'Cerita Varian Habbie',
            'align' => 'center',
            'color' => 'grey',
        ])
        <div>
            {{-- @php
                $contents = [
                    [
                        'title' => 'Jasmine Tea',
                        'image' => 'storage/img/Tea1.png',
                        'subtitle' => 'Indonesia',
                        'description' => 'Cerita pembuatan Jasmine Tea bermula di sore hari. Petani memetik kuncup bunga Melati agar mekar di malam hari. Daun teh digabungkan dengan kuncup bunga Melati dalam ruangan aromatik semalam. Aroma Melati menyelimuti teh dengan kelembutan. Saat fajar, petani memanen teh hasil semalam. Proses ini terangkum dalam Habbie Aromatic Telon Oil No 1 Jasmine Tea.',
                    ],
                    [
                        'title' => 'Fresh Tea',
                        'image' => 'storage/img/Tea2.png',
                        'subtitle' => 'Jepang',
                        'description' => "Teh terbaik diproduksi dari pucuk daun termuda. Varian Fresh Tea menggunakan 2 pucuk daun minimal proses, tanpa pengeringan, langsung diekstrak minyak aromatiknya. Aroma daun teh segar bunda rasakan dalam Habbie Aromatic Telon Oil No 2 Fresh Tea.",
                    ],
                    [
                        'title' => 'Matcha Tea',
                        'image' => 'storage/img/Tea3.png',
                        'subtitle' => 'Jepang',
                        'description' => "Tradisi minum teh di Jepang pada abad ke-9 menggunakan Matcha sebagai media meditasi menenangkan pikiran. Matcha tinggi tanin, mengurangi stress, tingkatkan mood. Daun teh hijau ditutup 20-30 hari sebelum dipanen untuk tingkatkan tanin dan klorofil. Daun dipanen dan dikeringkan cepat, kadar klorofil terjaga. Batang dipisahkan, daun ditumbuk. Voila, teh klorofil tinggi dengan aroma tanin hadir. FYI Habbie Aromatic Telon Oil No 3 Matcha Tea, cipta ketenangan pikiran.",
                    ],
                ];
            @endphp --}}
            <livewire:slider-story-product />
        </div>

    </div>
@endsection
