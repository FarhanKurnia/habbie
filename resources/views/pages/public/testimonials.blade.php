@extends('layouts.base-layout')

@section('title', 'Testimonials')
@section('content')

    @php
        $contents = [
            [
                'name' => 'Amanda KInasih',
                'image' => 'storage/img/sample-image-article-01.jpg',
                'info' => 'Guru, Makassar',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus qui sed minima, labore laborum inventore, eos dolorum nam dicta, earum corrupti molestias! Atque in porro, accusantium voluptas qui nam corporis.',
            ],
            [
                'name' => 'Amanda Kinasih',
                'image' => 'storage/img/sample-image-article-01.jpg',
                'info' => 'Guru, Makassar',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus qui sed minima, labore laborum inventore, eos dolorum nam dicta, earum corrupti molestias! Atque in porro, accusantium voluptas qui nam corporis.',
            ],
        ];
    @endphp

    <div class="container mx-auto py-14">
        <div>
            <div class="text-center">
                <h3 class="font-bold text-2xl text-pink-primary">Cerita Mombie</h3>
                <p>Perjalanan setiap ibu dengan Habbie dalam kesehariannya</p>
            </div>
            @include('components.public.partials.testimonial-slider', ['contents' => $contents])
        </div>

        <div class="my-8 mx-8 lg:mx-0">
            <div class="flex justify-start">
                <span class="flex flex-col text-center gap-2">
                    <p class="text-xs font-bold">Product Reviews</p>
                    <p class="font-bold text-5xl">4.61</p>
                    <span class="flex flex-row">
                        @for ($i = 1; $i <= 4; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" fill="#f9d800" stroke="#8c8c8c"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        @endfor
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke="#8c8c8c"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </span>
                    <p class="text-sm text-grey-secondary">8576 reviews</p>
                </span>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mx-8 lg:mx-0">
            @for ($j = 1; $j <= 6; $j++)
                <div>
                    <div class="bg-pink-bloosom p-4 flex items-center rounded-t-lg justify-between">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-lg font-bold">Yanto</p>
                        </span>
                        <span class="flex">
                            @for ($i = 1; $i <= 4; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" fill="#DE586C" stroke="#8c8c8c"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            @endfor
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke="#8c8c8c"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>

                        </span>
                    </div>
                    <div class="bg-grey-secondary-50 p-4 rounded-b-lg flex flex-col gap-4">
                        <p class="text-right text-sm text-gray">2 days ago</p>
                        <p class="text-pink-primary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi placeat,
                            soluta voluptatibus nemo ad nihil dolorum illum tempora quasi possimus.</p>
                        <p class="text-gray text-sm">Review left on: <span class="font-bold">Magnolia 100ML</span> </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection
