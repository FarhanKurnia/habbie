<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body class="bg-grey-secondary-50 px-4">
    <div class="w-1/3 mx-auto">
        <header class="container bg-pink-bloosom py-4 bg-opacity-60">
            @include('components.mail.template.header')
        </header>
    
        <main class="container bg-white p-4">
            @yield('content')
        </main>
    
        <footer class="container bg-grey p-8">
            @include('components.mail.template.footer')
        </footer>
    </div>
</body>

</html>
