<?php

use App\Livewire\Admin\Commande;

new Commande;
?>
<div>

<div>
    <h1 class="text-white">Liste des Commandes</h1>

    @if($commande->isEmpty())
        <p>Aucune commande trouvée pour le moment.</p>
    @else
    
    <div class="grid lg:grid-cols-3 md:grid-cols-3 gap-3">
                @foreach($commande as $commandes)
        <div class="category-card bg-3d-green-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            
                    <strong>Nom du personne : </strong>{{ $commandes->nom }} <br>
                        <strong>Email :</strong><a href="mailto:{{ $commandes->email }}">{{ $commandes->email }}</a><br>
                        <strong>Date de la Commande</strong>{{ $commandes->created_at->format('d/m/Y H:i') }} <br>
                        <strong>Produit(s)</strong>
                            @foreach($produit as $produits)
                                @if($produits->id == $commandes->produit_id)
                                <li>{{ $produits->nom }}</li>
                                @endif
                            @endforeach
                        <br>
                        <strong>Catégorie(s)</strong>
                            @foreach($category as $categori)
                                @if($categori->id == $commandes->category_id) {{-- Vérifie si le produit a une catégorie associée --}}
                                    <li>{{ $categori->type }}</li>
                                @endif
                            @endforeach
                        <br>
                        <strong>Point de Retrait</strong>
                        @foreach($place as $places)
                            @if($places->id == $commandes->place_id)
                                    {{ $places->nom }}
                            @endif
                        @endforeach
                        <br>
                        <br>
                        @if(empty($commandes->type))
                        <a href="{{route('confirm.commande',['id'=>$commandes->id])}}" wire:navigate class="btn-blue">{{ __('bouton.bouton-confirm') }}</a>
                       
                        @endif
        </div>
                @endforeach
    </div>
    @endif
</div>
       
</div>
