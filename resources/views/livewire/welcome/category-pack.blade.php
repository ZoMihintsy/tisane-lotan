<?php

use App\Livewire\Welcome\CategoryPack;

new CategoryPack;
?>
<div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 border-b">
    @foreach($category as $_category)
                <a href="" class="category-card bg-3d-blue-linear hover:scale-110  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <h1 class="text-center text-3xl text-green">
                        {{$_category->type}}
                    </h1>
                    <div class="p-4 text-left font-medium mb-4">
                    {!! Str::limit($_category->description,50) !!}
                    </div>
                </a>
    @endforeach
    
            </div>
    <a href="{{route('category')}}" wire:navigate> {{ __('accueil.plus')}}</a>
</div>
