<?php

use App\Livewire\Admin\Points;

new Points;
?>
<div>
<x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $i = 0;
        @endphp
        @foreach($points as $point)
        @php
            $i++;
        @endphp
        <div class="category-card bg-3d-blue-linear  rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        
        <a href="{{route('modification.point',['id'=>$point->id])}}" wire:navigate class="bi bi-pen rounded-md text-right hover:scale-110 text-black bg-white p-4" style="float:right"></a>
        
                <h2 class="text-3xl font-bold text-center text-green-800 mb-8">
                {{$point->nom}}
                </h2>
            <div class="p-4  font-medium">

                <h5 class="text-1xl font-bold  text-green-800 text-left ">
                {{__('renseignement.ville_point')}} : {{$point->ville}}
                </h5>
                <h5 class="text-1xl font-bold  text-green-800">
                    {{__('renseignement.code_point')}} : {{$point->code_postale}}
                </h5> 

            </div>
        </div>
        @endforeach
        
    </div>
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
