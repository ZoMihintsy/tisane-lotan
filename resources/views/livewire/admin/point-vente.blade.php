<?php

use App\Livewire\Admin\PointVente;

new PointVente;
?>

<div class="font-bold">
<x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="saved">
        <div class="w-50">
            <x-input-label :value="__('renseignement.title_point')" class="text-green-600  font-semibold text-xl  mb-2" />
            <x-text-input name="nom" wire:model="nom" class="w-full p-4" placeholder="{{__('renseignement.title_point')}}" />
            <x-input-error :messages="$errors->get('nom')" />
            <br>
            <x-input-label class="text-green-600  font-semibold text-xl mt-3 mb-3" :value="__('renseignement.name_vente_1')" />
            <x-text-input name="ville" id="mapUrlInput" wire:model="ville" class="w-full p-4" placeholder="{{__('renseignement.name_vente_1')}}" />
            <x-input-error :messages="$errors->get('ville')" />
            <x-input-label :value="__('renseignement.code_postale_1')" class="text-green-600  font-semibold text-xl mt-3 mb-2"/>
            <x-text-input name="code_postale" wire:model="code_postale" class="w-full p-4" placeholder="{{__('renseignement.code_postale_1')}}" />
            <x-input-error :messages="$errors->get('code_postale')" />
            <br>
            <br>
            <x-primary-button class="btn-blue">
               {{__('bouton.bouton_save')}}
            </x-primary-button>
        </div>
        
    </form>
    </div>
</div>
