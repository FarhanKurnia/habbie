<aside
    class="hidden absolute left-0 top-0 z-20 lg:flex h-screen w-72.5 flex-col overflow-y-hidden bg-pink-primary duration-300 ease-linear lg:static lg:translate-x-0">
    {{-- Sidebar Header --}}
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="{{ url('admin') }}">
            <h1 class="font-bold text-white text-2xl py-4">Habbie Admin</h1>
        </a>

    </div>

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <nav class="mt-2 py-4 px-4 lg:mt-2 lg:px-6">
            <div class="">
                <livewire:admin.sidebar-nav />
            </div>
        </nav>

    </div>


</aside>
