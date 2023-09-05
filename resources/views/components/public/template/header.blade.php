<header class="fixed w-full z-20">


    <livewire:header-recommendation />


    <div class="bg-white shadow-md">
        <div class="navbar bg-base-100 container mx-auto">
            <div class="navbar-start lg:w-full">
                <div class="mobile flex items-center lg:hidden">
                    {{-- mobile menu --}}
                    <div class="dropdown dropdown-start">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 z-20">
                            <li><a href="{{ url('/offers') }}">Offers</a></li>
                            <li>
                                <a>Products</a>
                                <livewire:menu-category-product />
                            </li>
                            <li><a href="{{ url('testimonials') }}">Testimonial</a></li>
                            <li>
                                <a>Membership</a>
                                <ul class="flex flex-col lg:flex-row p-2 z-20">
                                    <li>
                                        <ul class="flex flex-col">
                                            <li><a href="{{ url('membership') }}">Information</a></li>
                                            <li><a href="{{ url('membership/join') }}">Join Program</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ url('media') }}">Media</a></li>
                            @if (is_null(Auth::user()))
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                {{-- <li><a href="{{ url('/invoice') }}">Invoice</a></li> --}}
                                <li><a href="{{ url('/invoice') }}">Invoice</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            @endif
                        </ul>
                    </div>

                </div>

                {{-- logo desktop --}}
                <div class="hidden lg:flex logo lg:w-24">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>

                {{-- menu desktop --}}
                <ul class="menu menu-horizontal hidden lg:flex">
                    <li><a href="{{ url('/offers') }}" class="text-sm font-bold">OFFERS</a></li>
                    <li tabindex="0">
                        <details>
                            <summary class="text-sm font-bold">PRODUCT</summary>
                            <livewire:menu-category-product />
                        </details>
                    </li>
                    <li><a href="{{ url('testimonials') }}" class="text-sm font-bold">TESTIMONIAL</a></li>
                    <li tabindex="0">
                        <details>
                            <summary class="text-sm font-bold">MEMBERSHIP</summary>
                            <ul class="flex flex-col lg:flex-row p-2 z-20">
                                <li>
                                    <ul class="flex flex-col">
                                        <li><a href="{{ url('membership') }}">Information</a></li>
                                        <li><a href="{{ url('membership/join') }}">Join Program</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </details>
                    </li>
                    {{-- <li><a class="text-sm font-bold">MEMBERSHIP</a></li> --}}
                    <li><a href="{{ url('media') }}" class="text-sm font-bold">MEDIA</a></li>
                </ul>

            </div>

            {{-- mobile logo --}}
            <div class="navbar-center lg:hidden">
                <div class="w-28">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>
            </div>

            <div class="navbar-end">
                {{-- mobile --}}
                <div class="lg:hidden">
                    <livewire:cart-info />
                </div>


                {{-- desktop cart info & log in --}}
                <div class="hidden lg:flex gap-4 items-center">
                    {{-- search --}}
                    <livewire:search />

                    {{-- login desktop --}}
                    <div class="dropdown dropdown-hover">
                        <label tabindex="0" class="text-sm font-bold">
                            @if (is_null(Auth::user()))
                                ACCOUNT
                            @else
                                Hai, {{ strtok(Auth::user()->name, ' ') }}
                            @endif

                        </label>
                        {{-- {{Auth::user()}} --}}
                        @if (is_null(Auth::user()))
                            <ul tabindex="0"
                                class="dropdown-content z-[20] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            </ul>
                        @else
                            <ul tabindex="0"
                                class="dropdown-content z-[20] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                <li><a href="{{ url('invoice') }}">Invoice</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>

                            </ul>
                        @endif
                    </div>

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
