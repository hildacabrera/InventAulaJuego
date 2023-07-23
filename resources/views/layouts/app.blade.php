<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="bg-light text-center text-white">

            <!-- Grid container -->
            <div style="">
                <div class="container p-4 pb-0">
                    <!-- Section: Social media -->
                    <section class="mb-4">
                        <!-- Facebook -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;"
                            href="https://www.facebook.com/soyiudigital" role="button"><i
                                class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #55acee;"
                            href="https://twitter.com/IUDIGITAL" role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
                            href="https://www.linkedin.com/company/unavailable/" role="button"><i
                                class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                            href="https://www.instagram.com/iudigital/" role="button"><i
                                class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                    </section>
                    <!-- Section: Social media -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2023 Copyright:
                    <a class="text-white" href="https://www.iudigital.edu.co/Paginas/default.aspx">IU Digital de
                        Antioquia</a>
                </div>
                <!-- Copyright -->
        </footer>

    </div>
</body>

</html>
