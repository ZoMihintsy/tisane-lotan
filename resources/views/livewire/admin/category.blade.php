<?php

use App\Livewire\Admin\Category;

new Category;
?>
<div class="font-bold">
<x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center">
        <h2 class="text-3xl text-blue-light font-semibold mb-4">
        {{__('renseignement.categorie_title')}}
        </h2>
        <form wire:submit="saveCategory">
            <x-text-input class="w-full " wire:model="type" placeholder="{{__('renseignement.name_categorie')}}" />
            <x-input-error :messages="$errors->get('type')" />
            <br>
            <br>
            <x-text-input class="w-full " wire:model="type_package" placeholder="{{__('renseignement.categorie_title')}}" />
            <br>
            <br>
            <textarea name="" id="" cols="5" wire:model="description" rows="10" class="w-full rounded " style="resize: none"></textarea>
            <br>
            <br>
            <input type="submit" value="{{ __('bouton.bouton_save') }}" class="btn-blue ">
            <br>
            <br>
        </form>
    </div>
    <hr class="text-brown-light" >

    <div>
        
        <br>
        <h2 class="text-3xl text-blue-light font-semibold">
            {{__('accueil.categorie')}}
        </h2>
        <br>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $i = 0;
        @endphp
        @foreach($categorys as $categori)
        @php
            $i++;
        @endphp
        
        <div class="category-card bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <a href="{{route('modif.category',['id'=>$categori->id])}}" wire:navigate class="bi bi-pen rounded-md text-right hover:scale-110 transition text-black bg-white p-4" ></a>
        <a href="{{route('suppression.point',['id'=>$categori->id])}}" wire:navigate class="bi bi-trash rounded-md text-right hover:scale-110 text-white bg-red p-4" ></a>
            
        <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
            {{$categori->type}}
        </h2>
         
            <div class="p-4  font-medium">
            <h5 class="text-1xl font-bold  text-green-800">
                    Type de package : {{ $categori->type_package }}
                </h5> 
                <h5 class="text-1xl font-bold  text-green-800">
                   @if(strlen($categori->description) < 1)  @else Description : {!! $categori->description !!} @endif
                </h5> 
                <br>
            <br>
        
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
    </div>
</div>
