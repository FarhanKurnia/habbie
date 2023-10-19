{{-- <!DOCTYPE HTML
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office"> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.cdnfonts.com/css/dinpro-medium" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dinpro-bold" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <title>@yield('title')</title> --}}
</head>

<body class="bg-grey-secondary-50 px-4">
    <div class="w-1/2 mx-auto">
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
