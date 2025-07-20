<?php

use App\Livewire\Admin\Modificationcategory;

new Modificationcategory;
?>
<div>
    <form wire:submit="saveCategory">
            <x-text-input class="w-full " wire:model="type" placeholder="{{__('renseignement.name_categorie')}}" />
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
