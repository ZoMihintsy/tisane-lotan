<?php

use App\Livewire\Admin\AddProduit;

new AddProduit;
?>
<div>
    <h2 class="text-center text-3xl">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    </h2>
    <form wire:submit="saveProduit" class="text-center  rounded shadow mb-3 border-b" method="post">
    <x-input-label for="image" class="text-green-600  font-semibold text-xl " :value="__('renseignement.title_photo')" />
    @if($photo)
    <center>
    <img src="{{$photo->temporaryUrl()}}" class="rounded text-center " style="width:50%;height:50%" alt="" srcset="">
    </center>
    @else
    <h1 class="bi bi-card-image" style="font-size:500%" ></h1>
    @endif
    
    <input type="file" name="photo" accept="image/*" wire:model="photo" class="hidden" id="image">
    <x-input-error :messages="$errors->get('photo')" />
    
    <x-input-label :value="__('renseignement.title_ajout')" class="text-green-600  font-semibold text-xl mb-3" />
    <x-text-input wire:model="nom" name="nom" type="text" placeholder="{{ __('renseignement.title_ajout')}}" />
    <br>
    <x-input-error :messages="$errors->get('nom')"/>

    <br>
    <x-input-label :value="__('renseignement.mot_categorie')" class="text-green-600  font-semibold text-xl  "/>
    <br>
    <select name="" id="" wire:input="addPack" wire:model="categorie" class="w-50 rounded ">
        <option value="">----Categorie----</option>
        <br>
        
        @foreach($category as $_category)
            <option value="{{$_category->id}}">{{$_category->type}}</option>
        @endforeach
    </select>
    <br>
    <x-input-error :messages="$errors->get('categorie')" />
    <br>
    <x-input-label :value="__('renseignement.number_pro')" class="text-green-600  font-semibold text-xl  "/>
    <br>
    <x-text-input wire:model="nbrpack" name="" type="number"/>
    <x-text-input class="hover:disabled" wire:model="pack" />
    <br>
    <br>
    <x-input-label :value="__('renseignement.mot_descri_pro')" class="text-green-600  font-semibold text-xl "/>
    <br>
    <textarea name="" id="" wire:model="description" cols="40" class="rounded " placeholder="{{ __('renseignement.title_descri_prod')}}" rows="2"></textarea>
    <x-input-error :messages="$errors->get('description')" class="text-blue"/>
    
    <br>
    <br>
    <input type="submit" value="{{ __('bouton.bouton_save')}}" class="btn-blue">
    <br>
    <br>
</form>
<div>
        <h2 class="text-3xl text-blue-light font-semibold">
            {{__('footer.produit')}}
            <datalist id="produit">
            @foreach($produire as $produits_)
                <option value="{{$produits_->nom}}" >
            @endforeach
            </datalist>
        </h2>
        <br>
        <form wire:submit="searchs">
            <input type="search" name="" wire:model="search" list="produit" class="rounded " placeholder="{{ __('')}}" id="">
        </form>
        
        <br>
        <br>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $i = 0;
        @endphp
        @foreach($produire as $produits)
        @php
            $i++;
        @endphp
        <div class="category-card bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <h1 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: uppercase">
            {{ $produits->nom }}
        </h1>
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8" style="text-transform: capitalize">
                <img src="{{asset('storage/'.$produits->photo) }}" class="hover:scale-110 transition" alt="" style="width:15cm;height:10cm" srcset="">
            </h2>
            <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    {{ __('renseignement.title_descri_prod')}} : <br>
                    {!! $produits->description !!}
                </h5> 
            </div>
            <div>
               Nombre de pack:  @if(empty($produits->quantiter)) <span class="bi bi-infinity"></span> @else {{$produits->quantiter}} @endif 
            </div>
            <br><br>
            <a href="{{route('modification.produit',['id'=>$produits->id])}}" wire:navigate class="bi bi-pen rounded-md text-right hover:scale-110 text-black bg-white p-4"></a>
        <a href="{{route('delete.produit',['id'=>$produits->id])}}" wire:navigate class="bi bi-trash rounded-md text-right hover:scale-110 text-white bg-red p-4"></a>
           
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
