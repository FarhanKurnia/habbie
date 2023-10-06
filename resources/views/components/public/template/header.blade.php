<header class="fixed w-full z-20">


    <livewire:header-recommendation />


    <div class="bg-white shadow-md">
        <div class="navbar bg-base-100 container mx-auto">
            <div class="navbar-start lg:w-full">
                <div class="mobile flex items-center lg:hidden">
                    {{-- mobile menu --}}
                    <livewire:mobile-menu-button />
                </div>

                {{-- logo desktop --}}
                <div class="hidden lg:flex logo lg:w-24">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>

                {{-- menu desktop --}}
                <div class="menu menu-horizontal hidden lg:flex">
                    <div><a href="{{ url('/offers') }}" class="btn font-bold bg-white border-0">OFFERS</a></div>
                    <div class="dropdown dropdown-hover">
                        <label tabindex="0" class="btn bg-white border-0 flex gap-2 items-center">
                            <p class="font-bold">Product</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </label>
                        <livewire:menu-category-product />
                    </div>
                    <div><a href="{{ url('testimonials') }}" class="btn font-bold bg-white border-0">TESTIMONIAL</a>
                    </div>
                    <div class="dropdown dropdown-hover">
                        <label tabindex="0" class="btn bg-white border-0 flex gap-2 items-center">
                            <p class="font-bold">Membership</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </label>
                        <ul tabindex="0" class="menu dropdown-content z-50 p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="{{ url('membership') }}">Information</a></li>
                            <li><a href="{{ url('membership/join') }}">Join Program</a></li>
                        </ul>
                    </div>

                    {{-- <li><a class="text-sm font-bold">MEMBERSHIP</a></li> --}}
                    <div><a href="{{ url('media') }}" class="btn font-bold bg-white border-0">MEDIA</a></div>
                </div>

            </div>

            {{-- mobile logo --}}
            <div class="navbar-center lg:hidden">
                <div class="w-28">
                    <a href="{{ url('/') }}" class="font-bold text-3xl"><img
                            src="{{ asset('storage/img/logo/logo-habbie.svg') }}"
                            alt="Habbie Aromatic by Nature All Around the world"></a>
                </div>
            </div>

            {{-- mobile --}}
            <div class="navbar-end lg:hidden">
                <livewire:cart-info />
            </div>

            <div class="navbar-end hidden lg:flex gap-4">

                <div>
                    <livewire:search />

                    <div class="dropdown dropdown-hover dropdown-end">
                        <label tabindex="0" class="text-sm font-bold">
                            @if (is_null(Auth::user()))
                                ACCOUNT
                            @else
                                Hai, {{ strtok(Auth::user()->name, ' ') }}
                            @endif

                        </label>
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

                    <livewire:cart-info />

                </div>
            </div>
        </div>
    </div>

    {{-- dropdown mobile --}}
    <livewire:mobile-menu />
    @if (session()->has('error'))
        <div class="mx-auto">
            <livewire:alert :message="session('error')" :background="'bg-danger'" />
        </div>
    @endif

    <div class="container mx-auto">
        <div class="relative">
            <div class="absolute w-full top-0 ">
                <livewire:toast />
            </div>
        </div>
    </div>

</header>
