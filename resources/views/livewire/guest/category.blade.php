<?php

use App\Livewire\Guest\Category;

new Category;
?>
<div>
<div class="grid lg:grid-cols-3 md:grid-cols-3 gap-3">

    @foreach($categorie as $category)
    <div class="category-card-2 bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <h1 class="text-2xl font-bold text-center text-green-800" style="text-transform: uppercase">
            {{ $category->type }}
        </h1>
        <center>
        <span class="bi bi-cup-hot text-center text-3xl"></span>
        </center>

        <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    {{ __('renseignement.title_descri_prod')}} : <br>
                    {!! $category->description !!}
                </h5> 
        </div>
    </div>
    @endforeach
</div>
</div>
