<footer>
    <div class="bg-pink-bloosom py-14">
        <div class="container mx-auto">
            <div class="footer-content flex flex-col lg:flex-row text-sm px-6 lg:px-0 lg:gap-6">

                <div class="mb-4 lg:w-1/6">
                    <p class="text-lg font-bold text-pink-primary py-4">ABOUT US</p>
                    <div class="flex flex-col space-y-1">
                        <a href="{{ url('about') }}" class="hover:text-grey font-bold">OUR STORY</a>
                        <a href="{{ url('careers') }}" class="hover:text-grey font-bold">CAREERS</a>
                    </div>
                </div>

                @php
                    $marketplace_left = [
                        [
                            'img' => 'shopee.png',
                            'name' => 'Shopee',
                            'url' => 'https://shopee.co.id/habbie.id?utm_source=instagram&utm_medium=seller&utm_campaign=s_SS_ID_IG04_organic&utm_content=all',
                        ],
                        [
                            'img' => 'tokopedia.png',
                            'name' => 'Tokopedia',
                            'url' => 'https://www.tokopedia.com/habbie',
                        ],
                        [
                            'img' => 'bukalapak.png',
                            'name' => 'Buka Lapak',
                            'url' => 'https://www.bukalapak.com/u/habbie_id',
                        ],
                    ];
                    
                    $marketplace_right = [
                        [
                            'img' => 'blibli.png',
                            'name' => 'Blibli',
                            'url' => 'https://www.blibli.com/merchant/habbie-official-store/HAO-70108?pickupPointCode=ALL_LOCATIONS',
                        ],
                        [
                            'img' => 'zalora.png',
                            'name' => 'Zalora',
                            'url' => 'https://www.zalora.co.id/habbie/',
                        ],
                        [
                            'img' => 'lazada.png',
                            'name' => 'Lazada',
                            'url' => 'https://www.lazada.co.id/shop/habbie/',
                        ],
                    ];
                    
                    $sosmed = [
                        [
                            'img' => 'facebook.png',
                            'name' => 'habbie_id',
                            'url' => 'https://www.facebook.com/habbie.id/',
                        ],
                        [
                            'img' => 'youtube.png',
                            'name' => 'Habbie Official',
                            'url' => 'https://www.youtube.com/channel/UC4AhTYS99l6Bw-0S0PfMwtA',
                        ],
                        [
                            'img' => 'Instagram.png',
                            'name' => 'habbie_id',
                            'url' => 'https://www.instagram.com/habbie_id/',
                        ],
                        [
                            'img' => 'tiktok.png',
                            'name' => 'habbie_id',
                            'url' => 'https://www.tiktok.com/@habbie_id?lang=en',
                        ],
                    ];
                    
                    $i = 0;
                @endphp

                <div class="mb-4 lg:w-1/5">
                    <p class="text-lg font-bold text-pink-primary py-4">MARKETPLACE</p>
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col space-y-1">
                            @foreach ($marketplace_left as $item)
                                <span class="flex gap-2 items-center py-2">
                                    <img class="h-8" src="{{ url('storage/img/' . $item['img']) }}"
                                        alt="{{ $item['name'] }}">
                                    <a target="_blank" href="{{ $item['url'] }}"
                                        class="hover:text-grey font-bold underline">{{ $item['name'] }}</a>
                                </span>
                            @endforeach
                        </div>
                        <div class="flex flex-col space-y-1">
                            @foreach ($marketplace_right as $item)
                                <span class="flex gap-2 items-center py-2">
                                    <img class="h-8" src="{{ url('storage/img/' . $item['img']) }}"
                                        alt="{{ $item['name'] }}">
                                    <a target="_blank" href="{{ $item['url'] }}"
                                        class="hover:text-grey font-bold underline">{{ $item['name'] }}</a>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mb-4 lg:w-1/5">
                    <p class="text-lg font-bold text-pink-primary py-4">HELP</p>
                    <div class="flex flex-col space-y-1">
                        <p class="hover:text-grey font-bold">FIXED LINE (0274) 5025200</p>
                        <p class="hover:text-grey font-bold">CARELINE@HABBIE.CO.ID</p>
                    </div>
                </div>

                <div class="col-span-2 mb-4 lg:w-2/5">
                    <p class="text-lg text-pink-primary font-bold py-4">NEWSLETTER</p>
                    <div class="flex flex-col space-y-1">
                        <p class="hover:text-grey pb-2">Sign Up to get Exclusive Promo and Update</p>
                        <livewire:form-subscribe />
                    </div>
                </div>
            </div>

            <div class="footer-copyright pt-14 px-6 lg:px-0">
                <div class="flex flex-col lg:flex-row items-center lg:items-end lg:justify-between space-y-4">
                    <div class="flex flex-col space-y-4">
                        <p class="hover:text-grey font-bold text-center lg:text-left">GET CONNECTED</p>
                        <div class="flex flex-row gap-4">
                            @foreach ($sosmed as $item)
                            <a target="_blank" href="{{ $item['url'] }}">
                                <img class="h-6" src="{{ url('storage/img/' . $item['img']) }}"
                                alt="{{ $item['name'] }}">
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">{{ date('Y'); }} | Habbie</p>
                    </div>
                    <div class="flex flex-row justify-end gap-4">
                        <a href="#" class="hover:text-grey">Terms of Service</a>
                        <a href="#" class="hover:text-grey">Privacy Policy</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer>
