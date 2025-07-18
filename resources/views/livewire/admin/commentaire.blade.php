<?php

use App\Livewire\Admin\Commentaire;

new Commentaire;
?>
<div>
<section class="remarques-section">
    <div class="container">
        <h2>Ce que nos clients disent de nous</h2>
        <p class="section-description">Découvrez les avis de ceux qui nous ont fait confiance et partagez votre expérience.</p>

        @if($remarques->isEmpty())
            <div class="no-remarques-message">
                <p>Aucune remarque n'est disponible pour le moment. Soyez le premier à laisser un avis !</p>
            </div>
        @else
            <div class="remarques-grid">
                @foreach($remarques as $remarque)
                    <article class="remarque-item">
                        
                        <div class="remarque-content">
                            {{-- L'icône de citation nécessite Font Awesome --}}
                            <i class="bi bi-quote-left quote-icon"></i>
                            <p class="remarque-text">{!! $remarque->message !!}</p>
                        </div>
                        <div class="remarque-author">
                            
                               
                                <span class="bi bi-person-circle text-3xl mr-2"></span>
                            
                            <div class="author-details">
                                <span class="author-name">{{ $remarque->nom }}</span>
                                <time datetime="{{ $remarque->created_at->format('Y-m-d') }}" class="remarque-date">
                                    Publié le {{ $remarque->created_at->format('d/m/Y') }}
                                </time>
                            </div> 
                        </div>
                        <br><br>
                        <a href="{{route('supprime.coms',['id'=>$remarque->id])}}" class="btn-red text-center">Supprimer</a>
                    </article>
                    
                @endforeach
            </div>
        @endif
    </div>
</section>
<style>
    /* Styles de base pour la section des remarques */
    .remarques-section {
        padding: 60px 0;
        background-color: #f8f8f8;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .remarques-section h2 {
        font-size: 2.8em;
        color: #333;
        margin-bottom: 15px;
        font-family: 'Segoe UI', sans-serif;
    }

    .remarques-section .section-description {
        font-size: 1.1em;
        color: #666;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .no-remarques-message {
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        color: #555;
        font-style: italic;
        margin-top: 30px;
    }

    /* Styles de la grille pour les remarques */
    .remarques-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .remarque-item {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: left;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .remarque-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .remarque-content {
        margin-bottom: 20px;
        position: relative;
    }

    .remarque-content .quote-icon {
        position: absolute;
        top: 0;
        left: 0;
        font-size: 3em;
        color: #e0e0e0;
        opacity: 0.8;
        transform: translate(-15px, -15px);
        z-index: 1;
    }

    .remarque-text {
        font-size: 1.1em;
        line-height: 1.6;
        color: #444;
        position: relative;
        z-index: 2;
        padding-left: 20px;
    }

    .remarque-author {
        display: flex;
        align-items: center;
        margin-top: 20px;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #4CAF50;
    }

    .author-details {
        display: flex;
        flex-direction: column;
    }

    .author-name {
        font-weight: bold;
        color: #333;
        font-size: 1.1em;
    }

    .author-title {
        font-size: 0.9em;
        color: #777;
        margin-top: 3px;
    }

    .remarque-date {
        font-size: 0.85em;
        color: #999;
        margin-top: 5px;
    }

    /* Styles pour la notation par étoiles (optionnel) */
    .remarque-rating {
        margin-top: 15px;
        font-size: 1.2em;
        color: #fbc02d;
    }

    .remarque-rating .fas.fa-star {
        color: #ddd;
    }

    .remarque-rating .fas.fa-star.filled {
        color: #fbc02d;
    }

    /* Styles pour le bouton "Laissez votre remarque" */
    .btn {
        display: inline-block;
        padding: 12px 25px;
        font-size: 1em;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary {
        background-color: #4CAF50;
        color: white;
        border: 2px solid #4CAF50;
    }

    .btn-primary:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    /* Media Queries pour la responsivité */
    @media (max-width: 768px) {
        .remarques-grid {
            grid-template-columns: 1fr;
        }
        .remarques-section h2 {
            font-size: 2em;
        }
    }
</style>
</div>