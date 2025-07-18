<?php

use App\Livewire\Guest\Place;

new Place;
?>
<div>
    <div class="grid lg:grid-cols-3 md:grid-cols-3 gap-3">

    @foreach($place as $places)
    <div class="category-card-2 bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <h1 class="text-2xl font-bold text-center text-green-800" style="text-transform: uppercase">
            {{ $places->nom }}
        </h1>
        <center>
        <span class="bi bi-shop text-center text-3xl"></span>
        </center>

        <div class="p-4  font-medium">
                <h5 class="text-1xl font-bold  text-green-800">
                    Ville : {{$places->ville}}
                    <br>
                    Code postal : {{ $places->code_postale }}
                </h5> 
        </div>
    </div>
    @endforeach
    </div>
</div>
