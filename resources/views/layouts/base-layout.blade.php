<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>

    <header>
        @include('components.public.template.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('components.public.template.footer')
    </footer>

    @livewireScripts
</body>

</html>
