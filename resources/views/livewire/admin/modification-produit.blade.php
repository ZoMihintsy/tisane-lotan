<?php

use App\Livewire\Admin\ModificationProduit;

new ModificationProduit;

?>
<div>
    
    <form wire:submit="saveChange">
    <x-input-label :value="__('Entre le nom ')" />

    <input type="text" name="nom" wire:model="nom" class="w-full rounded" placeholder ="Entrez un nouveau nom ">
    <x-input-error :messages="$errors->get('nom')"/>
    <x-input-label :value="__('Description du produit')" />
    <textarea contenteditable name="description" rows="10" wire:model="description" class="w-full rounded" placeholder ="Entrer la description"></textarea>
    <x-input-error :messages="$errors->get('description')"/>
    <x-input-label :value="__('Nombre de produit')" />
    <x-text-input type="number" wire:model="quantiter" placeholder="Nombre de pack" />
    <x-input-error :messages="$errors->get('description')"/>

    <x-input-label for="image" :value="__('Photo du publication')" />
    @if($photo == $tof)
        <img src="{{ asset('storage/'.$photo)  }}" style="width:10cm;height:5cm;" alt="" srcset="">
    @else 
    <img src="{{ $photo->temporaryUrl() }}" style="width:10cm;height:5cm;" alt="" srcset="">
    @endif

    <input type="file" name="photo" accept="image/*" wire:model="photo" class="hidden" id="image">
    <x-input-error :messages="$errors->get('photo')"/>

        <br>
        <br>
        <button class="btn-blue-light">
            Enregistrer
        </button>
    </form>
</div>
