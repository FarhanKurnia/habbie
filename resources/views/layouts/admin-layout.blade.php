<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/dinpro-medium" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dinpro-bold" rel="stylesheet">
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

    @livewireScripts
</body>
</html>
