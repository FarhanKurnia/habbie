<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/dinpro-medium" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dinpro-bold" rel="stylesheet">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Include DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        @include('components.admin.template.sidebar')

        {{-- Content --}}
        {{-- Header --}}
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            @include('components.admin.template.navbar')

            {{-- Main Content --}}
            <main class="bg-pink-bloosom bg-opacity-30">
                @yield('content')
            </main>
        </div>
    </div>

    <script type="text/javascript" src="{{ url('/assets/js/admin/script.js') }}"></script>
    @livewireScripts
</body>
</html>
