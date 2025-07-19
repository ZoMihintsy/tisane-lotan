<?php

use App\Livewire\Admin\Dashboard;

new Dashboard;
?>
<div>
    <div class="grid lg:grid-cols-3 md:grid-cols-3 gap-3">
    <a href="{{route('t.produit')}}" wire:navigate>

        <div class="category-card bg-3d-blue-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
                {{__('accueil.produits')}}
            </h2>
            <center>
                <span class="bi bi-box text-center text-3xl"></span>
            </center>
                <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                        {{$produit}} {{__('accueil.produits')}}
                </h5> 
                </div>
        </div>
    </a>
        <a href="{{route('t.category')}}" wire:navigate>

        <div class="category-card bg-3d-blue-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
                {{__('accueil.categorie')}}
            </h2>
            <center>
                <span class="bi bi-cup-hot text-3xl"></span>
            </center>
                
                <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                        {{$category}} {{__('accueil.categorie')}}
                </h5> 
                </div>
        </div>
        </a>
        <a href="{{route('commande')}}" wire:navigate>

        <div class="category-card bg-3d-blue-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
                Commande
            </h2>
            <center>
                <span class="bi bi-basket text-3xl"></span>
            </center>
                <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                        {{$commande}} commande
                </h5> 
                </div>
        </div>
        </a>
        <a href="{{route('commentaire')}}" wire:navigate>
        <div class="category-card bg-3d-blue-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
                site coms
            </h2>
            <center>
                <span class="bi bi-people text-3xl"></span>
            </center>
                <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                        {{$commentaire}} coms
                </h5> 
                </div>
        </div>
        </a>
    </div>
</div>
