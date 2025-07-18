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
        <link rel="stylesheet" href="{{asset('styles/assets/app.css')}}">
        <link rel="stylesheet" href="{{asset('styles/assets/apps.css')}}">
        <link rel="stylesheet" href="{{asset('styles/assets/icon.css')}}">
        <script src="{{asset('styles/assets/app.js')}}"></script>
    </head>
    <style>
        .slider-wrapper {
            width: 100%;
            max-width: 1000px; /* Largeur du slider */
            max-height: 500px; /* Largeur du slider */
            overflow: hidden;
            position: relative;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
        }
        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slider-image-container {
            flex-shrink: 0;
            width: 100%;
            height: 300px; /* Hauteur des images */
        }
        .slider-image-container img {
            width: 150%;
            height: 150%;
            object-fit: cover;
        }
        .slider-nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            cursor: pointer;
            font-size: 0.5rem;
            border-radius: 0.5rem;
            z-index: 10;
        }
        .prev-btn { left: 1rem; }
        .next-btn { right: 1rem; }
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-3d-brown-linear">
            <livewire:welcome.navigation />
            <livewire:closing.close />
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-3d-green-radial shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include("footer.foot")
        </div>
    </body>
</html>