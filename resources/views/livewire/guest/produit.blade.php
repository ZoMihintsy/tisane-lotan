<?php

use App\Livewire\Guest\Produit;

new Produit;
?>
<div>
    <style>
    img{
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
        image-rendering: pixelated;
        width: 300px;
        height: 300px;
        object-fit: cover;
        object-position: center;
    }
    </style>
<form action="">
    <select name="" wire:input="trier" wire:model="trie" id="">
        <option value="">---Trier par category----</option>
        @foreach($types as $_type)
            <option value="{{$_type->id}}">{{$_type->type}}</option>
        @endforeach
    </select>
</form>
<div class="grid lg:grid-cols-3 md:grid-cols-3 gap-3">
        @php
            $i = 0;
        @endphp
        @foreach($produit as $produits)
        @php
            $i++;
        @endphp
        <div class="category-card-2 bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <h1 class="text-2xl font-bold text-center text-green-800" style="text-transform: uppercase">
            {{ $produits->nom }}
        </h1>
        <h2 class="text-2xl font-bold text-center text-green-800" style="text-transform: capitalize">
        <center>
            <img src="{{asset('storage/'.$produits->photo) }}"  class="rounded hover:scale-110 transition" alt="" srcset="">
        </center>
        </h2>
       <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    {{ __('renseignement.title_descri_prod')}} : <br>
                    {!! $produits->description !!}
                </h5> 
        </div>
        <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    Nombre de produit :
                    @if(is_null($produits->quantiter)|| $produits->quantiter === '') <span class="bi bi-infinity text-3xl"></span>@elseif((int) $produits->quantiter === 0) 0  @else {{$produits->quantiter}} @endif
                </h5> 
        </div>
        {{$produits->updated_at->diffForHumans()}}
        <br>
        <div class="text-center mb-4">
            
            <span class="bi bi-eye text-3xl mb-4" x-data="" x-on:click.prevent="$dispatch('open-modal','modal_{{$produits->id}}')"></span>
    <x-modal name="modal_{{$produits->id}}" :show="$errors->isNotEmpty()">
        <h1 class="text-2xl font-bold text-center text-green-800" style="text-transform: uppercase">
            {{ $produits->nom }}
        </h1>
        <h2 class="text-2xl font-bold text-center text-green-800" style="text-transform: capitalize">
        <center>
            <img src="{{asset('storage/'.$produits->photo) }}" class="hover:scale-110 transition" alt=""  srcset="">
        </center>
        </h2>
       <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    {{ __('renseignement.title_descri_prod')}} : <br>
                    {!! $produits->description !!}
                </h5> 
        </div>
        <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    Nombre de produit : <br>
                    @if(is_null($produits->quantiter)|| $produits->quantiter === '') <span class="bi bi-infinity text-3xl"></span>@elseif((int) $produits->quantiter === 0) 0  @else {{$produits->quantiter}} @endif 
                </h5> 
        </div>
        {{$produits->updated_at->diffForHumans()}}
        <br>
        @if(is_null($produits->quantiter)|| $produits->quantiter === '' ||(int) $produits->quantiter > 0)
        <label for="panier_{{$produits->id}}" class="bi bi-basket text-4xl mb-4"></label>
        <input type="radio" name="piece" id="panier_{{$produits->id}}" class="hidden" wire:input="panier" wire:model="paniers" value="{{$produits->id}}">
        @endif
        <br>
        
        @if(!empty($paniers))
        <div class="bg-3d-green-linear">

        <hr class="text-blue-700 text-3xl">
            <h2 class="text-3xl text-green-light">
                Placez votre commande en remplissant ces informations
            </h2>
        <br>
        <x-text-input type="text" class=" " name="name" wire:model="name" placeholder="Entrer votre nom" id="" />
        <x-input-error :messages="$errors->get('name')" />
        <br>
        <br>
        <x-text-input type="email" class=" " name="email" wire:model="email" placeholder="Entrer votre email" id=""/>
        <x-input-error :messages="$errors->get('email')" />
        <br>
        <br>
        <select name="emplacement" class="rounded" wire:model="emplacement"  id="">
            <option value="">----Point de retrait----</option>
            @foreach($emplacements as $_emplacement)
                <option value="{{$_emplacement->id}}">{{$_emplacement->nom}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('emplacement')" />
        <br>
        <br>
        <x-text-input type="number" class=" " name="quantiter" wire:model="quantiter" placeholder="Nombre à commander" id=""/> de {{$category_type->type_package}}
        <x-input-error :messages="$errors->get('quantiter')" />
        <br>
        <br>
        <!-- <input type="datetime" name="" id=""> -->
        <input type="datetime-local" name="crenaux"  class="rounded" wire:model="crenaux" id="">
        <br>
        <br>
        <input type="submit" value="Commander" wire:click="commander" class="btn-blue  ">
        <br><br>
        </div>
        @endif
        @if($in == 1)
            Votre commande a été envoyer, vous allez recevoir un email de confirmation merci. <br>
            <span class="bi bi-check-circle" style="font-size:900%"></span>
        @endif
    </x-modal>
        </div>
        </div>
        @endforeach
        @if($i == 0)
    <center>
        <style>
            #scal{
                transition:2s;
                animation: tourne 2s ease-in-out 3.5;
            }
            @keyframes tourne {
                0%{
                    rotate: -20deg;
                }
                50%{
                    
                    rotate: 20deg;
                }
                100%{
                    rotate: -20deg;


                }
            }
        </style>
    <div class="bi bi-question-circle text-center text-white transition ready:scale-110" style="font-size:900%" id="scal"></div>

    </center>

        @endif
</div>
