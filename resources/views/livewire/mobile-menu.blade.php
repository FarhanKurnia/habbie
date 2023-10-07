<div>
    @if ($showMobileMenu)
        <div class="bg-black w-full p-2 h-screen bg-opacity-90 z-20 text-white"
            wire:transition.slide.down.duration.300ms>
            <ul class="menu w-full ">
                <li><a href="{{ url('/offers') }}">Offers</a></li>
                <li>
                    <details open>
                        <summary>Products</summary>
                        <ul>
                            @foreach ($categories as $index => $category)
                                <li><a href="{{ url('/products/categories/' . $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </details>
                </li>
                <li><a href="{{ url('testimonials') }}">Testimonial</a></li>
                <li>
                    <details open>
                        <summary>Membership</summary>
                        <ul>
                            <li><a href="{{ url('membership') }}">Information</a></li>
                            <li><a href="{{ url('membership/join') }}">Join Program</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="{{ url('media') }}">Media</a></li>
                @if (is_null(Auth::user()))
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/invoice') }}">Invoice</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    @endif
</div>
