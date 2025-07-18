<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
    <body class="antialiased">
        <div class="sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
            <div class="bg-3d-brown-radial text-black/50 dark:text-white/50">
            
           <header class="grid grid-cols-4 items-center gap-0 w-full mb-4">
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
            </header>
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl ">
                <h2 class="text-3xl uppercase text-center text-secondary">
                    {{ __('accueil.banniere_hero_title') }}
                </h2>
            <p class="font-bold text-2xl text-brown border-b">
                {{ __('accueil.banniere_hero') }}
            </p>
                    <div class="slider-wrapper">
        <div id="slider-track" class="slider-track">
            <!-- Remplacez ces images par les vôtres -->
            <div class="slider-image-container"><img src="{{asset('img/img1.png')}}" alt="image1"></div>
            <div class="slider-image-container"><img src="{{asset('img/img2.png')}}" alt="image2"></div>
            <div class="slider-image-container"><img src="{{asset('img/img3.png')}}" alt="image3"></div>
            <div class="slider-image-container"><img src="{{asset('img/img4.png')}}" alt="image4"></div>
            <div class="slider-image-container"><img src="{{asset('img/img5.png')}}" alt="image5"></div>
            <div class="slider-image-container"><img src="{{asset('img/img6.png')}}" alt="image6"></div>
            <div class="slider-image-container"><img src="{{asset('img/img7.png')}}" alt="image7"></div>
            <div class="slider-image-container"><img src="{{asset('img/img8.png')}}" alt="image8"></div>
        </div>
        <button id="prev-btn" class="slider-nav-button prev-btn">&#10094;</button>
        <button id="next-btn" class="slider-nav-button next-btn">&#10095;</button>
    </div>
    <div class="bg-amer-50 text-green-900 py-3 px-4 text-center border-b border-amber-200">
        {{ __('accueil.mode_retrait') }}
    </div>
    <!-- a prendre  -->
    <div class="container mx-auto py-12 px-4 ">
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8">
                {{__('accueil.categories') }}
            </h2>
            @livewire('welcome.category-pack')
            <div class="bg-green-800 text-white py-12">
                <div class="container mx-auto px-4 border-b text-center">
                    <h2 class="text-3xl font-bold mb-8">
                        {{ __('accueil.engagements_title')}}
                    </h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mt-2 mb-2">
                                {{ __('accueil.engagements_text_1')}}
                            </h3>
                            <p>
                            {{ __('accueil.engagements_text_2')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-amber-50 py-16 text-center">
                <h2 class="text-3xl font-bold text-green-800 mb-4">
                    {{ __('accueil.decouvert_saveur_title') }}
                </h2>
                <p class="mb-8 text-lg">
                    {{ __('accueil.decouvert_saveur_text') }}
                </p>
                <a href="{{route('produit')}}" wire:navigate class="btn-blue">{{ __('accueil.voir_produits') }}</a>
            </div>
        
        
    </div>
                  <br>
                  <br>

                   
                </div>
                 @include("footer.foot")
    <script>
        // Script JavaScript simple pour le slider (5-10 lignes de logique principale)
        const sliderTrack = document.getElementById('slider-track');
        const images = sliderTrack.querySelectorAll('.slider-image-container');
        let currentIndex = 0;
        const imagesCount = images.length;

        function showImage(index) {
            currentIndex = (index + imagesCount) % imagesCount; // Boucle infinie
            sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        document.getElementById('next-btn').addEventListener('click', () => showImage(currentIndex + 1));
        document.getElementById('prev-btn').addEventListener('click', () => showImage(currentIndex - 1));
        var img = setInterval(()=>{
            showImage(currentIndex +1);
        },5000);

        showImage(0); // Affiche la première image au chargement
    </script>
            </div>
        </div>
        </div>
        

    </body>
</html>
