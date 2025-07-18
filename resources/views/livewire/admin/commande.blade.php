<?php

use App\Livewire\Admin\Commande;

new Commande;
?>
<div>
<style>
    /* Styles pour la mise en page générale du tableau */
    table {
        width: 100%;
        border-collapse: collapse; /* Fusionne les bordures des cellules */
        margin: 20px 0;
        font-family: Arial, sans-serif; /* Police de caractères plus lisible */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre légère pour un effet de profondeur */
        background-color: #fff; /* Fond blanc pour le tableau */
    }

    /* Styles pour l'en-tête du tableau */
    thead {
        background-color: #4CAF50; /* Couleur d'arrière-plan de l'en-tête (vert) */
        color: white; /* Couleur du texte de l'en-tête */
    }

    th {
        padding: 12px 15px;
        text-align: left; /* Alignement du texte à gauche */
        font-weight: bold; /* Texte en gras */
        border-bottom: 2px solid #ddd; /* Bordure inférieure pour séparer l'en-tête */
    }

    /* Styles pour les cellules du corps du tableau */
    td {
        padding: 10px 15px;
        border-bottom: 1px solid #ddd; /* Bordure inférieure légère pour chaque ligne */
        color: #333; /* Couleur du texte */
    }

    /* Style pour les lignes impaires (pour une meilleure lisibilité) */
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Couleur d'arrière-plan légèrement différente pour les lignes paires */
    }

    /* Effet de survol sur les lignes */
    tr:hover {
        background-color: #f1f1f1; /* Changement de couleur au survol */
        transition: background-color 0.3s ease; /* Transition douce */
    }

    /* Styles spécifiques pour les listes de produits/catégories dans les cellules */
    td ul {
        margin: 0;
        padding: 0;
        list-style: none; /* Supprime les puces par défaut des listes */
    }

    td ul li {
        margin-bottom: 3px; /* Espacement entre les éléments de liste */
    }

    /* Style pour le message si aucune commande n'est trouvée */
    .no-commands-message {
        text-align: center;
        padding: 20px;
        color: #666;
        font-style: italic;
    }

    /* Styles pour le titre de la page */
    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5em;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
</style>
<div>
    <h1 class="text-white">Liste des Commandes</h1>

    @if($commande->isEmpty())
        <p>Aucune commande trouvée pour le moment.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du personne</th>
                    <th>Email</th>
                    <th>Date de la Commande</th>
                    <th>Produit(s)</th>
                    <th>Catégorie(s)</th>
                    <th>Point de Retrait</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($commande as $commandes)
                    <tr>
                        <td> {{ $commandes->nom }}</td>
                        <td><a href="mailto:{{ $commandes->email }}">{{ $commandes->email }}</a></td>
                        <td>{{ $commandes->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @foreach($produit as $produits)
                                @if($produits->id == $commandes->produit_id)
                                <li>{{ $produits->nom }}</li>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($category as $categori)
                                @if($categori->id == $commandes->category_id) {{-- Vérifie si le produit a une catégorie associée --}}
                                    <li>{{ $categori->type }}</li>
                                @endif
                            @endforeach
                        </td>
                        <td>
                        @foreach($place as $places)
                            @if($places->id == $commandes->place_id)
                                    {{ $places->nom }}
                            @endif
                        @endforeach
                        </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
       
</div>
