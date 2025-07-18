<?php

use App\Livewire\Admin\ModificationPoint;

new ModificationPoint;
?>
<div>
    <form wire:submit="changePoint">
    <x-input-label :value="__('Nom du point de vente')" />

    <input type="text" name="nom" wire:model="nom" class="w-full rounded" placeholder ="Entrez un nouveau nom ">
    <x-input-error :messages="$errors->get('nom')"/>
    <x-input-label :value="__('Ville')" />
    <input type="text" name="ville" wire:model="ville" class="w-full rounded" placeholder ="Entrez un nouveau nom "/>
    <x-input-error :messages="$errors->get('ville')"/>

    <x-input-label :value="__('Code postale')" />
    <input type="text" name="code_postale" wire:model="code_postale" class="w-full rounded" placeholder ="Entrez un nouveau nom "/>
    <x-input-error :messages="$errors->get('code_postale')"/>

        <br>
        <br>
        <button class="btn-blue-light">
            Enregistrer
        </button>
        <a href="{{route('delete.point',['id'=>$id])}}" class="btn-red-light" onclick="if(confirm('supprimer cette point de vente ? action irreversible ')){}else return false">
            Supprimer
        </a>
    </form>
</div>
