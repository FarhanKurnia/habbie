<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/dinpro-medium" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dinpro-bold" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css" />
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>

    <header>
        @include('components.public.template.header')
    </header>

    <main class="pt-24">
        @yield('content')
    </main>

    <footer>
        @include('components.public.template.footer')
    </footer>

    @livewireScripts

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{ url('/assets/js/script.js'); }}"></script>
</body>

</html>
