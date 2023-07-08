<header class="fixed w-full z-20">


    <livewire:header-recommendation />


    <div class="bg-white shadow-md">
        <div class="navbar bg-base-100 container mx-auto">
            <div class="navbar-start lg:w-full">
                <div class="lg:hidden">
                    <livewire:cart-info />
                </div>
    
                {{-- logo desktop --}}
                <div class="hidden lg:flex logo lg:w-24">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>
    
                {{-- menu desktop --}}
                <ul class="menu menu-horizontal hidden lg:flex">
                    <li><a class="text-sm font-bold">OFFERS</a></li>
                    <li tabindex="0">
                        <details>
                            <summary class="text-sm font-bold">PRODUCT</summary>
                            <ul class="flex flex-row p-2 z-20">
                                <li>
                                    <ul class="flex flex-col float-left">
                                        <li><a class="#">AROMATIC TELON OIL</a></li>
                                        <li><a class="#">AROMATIC CAJUPUT OIL</a></li>
                                        <li><a class="#">ESSENTIALS OIL</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="flex flex-col float-left">
                                        <li><a class="#">AROMATIC TELON OIL</a></li>
                                        <li><a class="#">AROMATIC CAJUPUT OIL</a></li>
                                        <li><a class="#">ESSENTIALS OIL</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li><a class="text-sm font-bold">TESTIMONIAL</a></li>
                    <li><a class="text-sm font-bold">MEMBERSHIP</a></li>
                    <li><a class="text-sm font-bold">MEDIA</a></li>
                </ul>
    
            </div>
    
            {{-- mobile logo --}}
            <div class="navbar-center lg:hidden">
                <div class="w-28">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>
            </div>
    
            <div class="navbar-end">
                {{-- mobile --}}
                <div class="mobile flex items-center lg:hidden">
                    {{-- mobile menu --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 z-10">
                            <li><a>Offers</a></li>
                            <li>
                                <a>Products</a>
                                <ul class="p-2">
                                    <li><a class="text-grey">Submenu 1</a></li>
                                    <li><a class="text-grey">Submenu 2</a></li>
                                </ul>
                            </li>
                            <li><a>Testimonial</a></li>
                            <li><a>Membership</a></li>
                            <li><a>Media</a></li>
                            <li><a>Login or Register</a></li>
                        </ul>
                    </div>
    
                </div>
    
                {{-- desktop cart info & log in --}}
                <div class="hidden lg:flex gap-4 items-center">
                    {{-- search --}}
                    <div class="relative w-52 ">
                        <input type="text" placeholder="Search"
                            class="w-full px-4 py-2 pr-12 rounded-full bg-grey-secondary-50 focus:outline-none" />
                        <button class="absolute right-0 top-0 mt-1 mr-2 px-4 py-2 rounded-full  focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
    
                    </div>
    
                    {{-- login desktop --}}
                    <a href="#" class="text-sm font-bold">LOG IN</a>
    
                    {{-- cart desktop --}}
                    <livewire:cart-info />
                </div>
    
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="relative">
            <div class="absolute w-full top-0 ">
                <livewire:toast />
            </div>
        </div>
    </div>
</header>
