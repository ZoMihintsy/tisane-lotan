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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIINfBG9zRchXfCoVHF3mmEghzQ5RngWjx4="
     crossorigin=""/>
        <script src="{{asset('styles/assets/app.js')}}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-3d-brown-linear">
            <livewire:layout.navigation />

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
        </div>
    </body>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjGwZZyME89xJHIYDbpwwE/M/SgFc4="
     crossorigin=""></script>
     <script>
        let map = null; // Variable pour stocker l'instance de la carte Leaflet
        let marker = null; // Variable pour stocker l'instance du marqueur

        document.getElementById('searchButton').addEventListener('click', async () => {
            const query = document.getElementById('searchInput').value;
            const mapUrlInput = document.getElementById('mapUrlInput');
            const copyMessage = document.getElementById('copyMessage');

            copyMessage.style.display = 'none'; // Cache le message de copie précédent
            mapUrlInput.value = ''; // Réinitialise le champ d'URL

            if (!query) {
                alert("Veuillez entrer un terme de recherche.");
                return;
            }

            try {
                // Utiliser le service de géocodage Nominatim d'OpenStreetMap
                // Il convertit le texte d'une adresse en coordonnées (latitude, longitude).
                // ATTENTION : Ce service est gratuit mais a des limites d'utilisation (1 requête par seconde est une règle).
                // Pour une utilisation intensive, vous auriez besoin de votre propre service de géocodage.
                const nominatimUrl = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(query)}&format=json&limit=1&addressdetails=1`;
                
                const response = await fetch(nominatimUrl, {
                    headers: {
                        // Il est recommandé d'inclure un User-Agent pour identifier votre application.
                        // Remplacez par vos propres informations.
                        'User-Agent': 'MonApplicationDeCarte/1.0 (votre_email@exemple.com)' 
                    }
                });
                const data = await response.json();

                if (data && data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    const displayName = data[0].display_name;

                    // Initialiser la carte si elle n'existe pas
                    if (!map) {
                        map = L.map('mapContainer').setView([lat, lon], 15); // 15 est un bon niveau de zoom pour un lieu spécifique
                        // Ajouter les tuiles d'OpenStreetMap
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
                    } else {
                        // Si la carte existe déjà, il suffit de la centrer sur le nouveau lieu
                        map.setView([lat, lon], 15);
                    }

                    // Supprimer l'ancien marqueur s'il existe
                    if (marker) {
                        map.removeLayer(marker);
                    }

                    // Ajouter un nouveau marqueur pour l'emplacement trouvé
                    marker = L.marker([lat, lon]).addTo(map)
                        .bindPopup(`<b>${displayName.split(',')[0]}</b><br>${displayName}`) // Affiche un popup avec le nom
                        .openPopup(); // Ouvre le popup automatiquement

                    // Générer un permallien OpenStreetMap pour cet emplacement spécifique
                    // C'est une URL directe vers la carte OpenStreetMap centrée sur ces coordonnées et ce zoom
                    const permalink = `https://www.openstreetmap.org/?mlat=${lat}&mlon=${lon}#map=15/${lat}/${lon}`;
                    mapUrlInput.value = permalink;

                } else {
                    alert("Aucun résultat trouvé pour cette recherche. Veuillez essayer un autre terme.");
                    // Réinitialiser la carte ou la centrer globalement si aucun résultat
                    if (map) {
                        map.setView([0, 0], 2); // Niveau de zoom global
                        if (marker) {
                            map.removeLayer(marker);
                            marker = null;
                        }
                    }
                    mapUrlInput.value = '';
                }

            } catch (error) {
                console.error('Erreur lors de la recherche ou du chargement de la carte :', error);
                alert("Une erreur est survenue lors de la recherche ou du chargement de la carte. Vérifiez votre connexion ou réessayez.");
                if (map) {
                    map.setView([0, 0], 2);
                    if (marker) {
                        map.removeLayer(marker);
                        marker = null;
                    }
                }
                mapUrlInput.value = '';
            }
        });

        // Fonctionnalité de copie de l'URL (inchangée)
        document.getElementById('copyUrlButton').addEventListener('click', () => {
            const mapUrlInput = document.getElementById('mapUrlInput');
            const copyMessage = document.getElementById('copyMessage');

            if (mapUrlInput.value && mapUrlInput.value !== mapUrlInput.placeholder) {
                mapUrlInput.select(); 
                mapUrlInput.setSelectionRange(0, 99999); 
                try {
                    document.execCommand("copy"); 
                    copyMessage.textContent = 'URL copiée !';
                    copyMessage.style.display = 'block';
                    setTimeout(() => { copyMessage.style.display = 'none'; }, 2000); 
                } catch (err) {
                    console.error('Impossible de copier l\'URL', err);
                    alert('Échec de la copie de l\'URL. Veuillez la copier manuellement.');
                }
            } else {
                alert("Il n'y a pas d'URL à copier ou la carte n'a pas été chargée.");
            }
        });
    </script>
   
</html>
