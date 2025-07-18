<?php

namespace App\Livewire\Guest;

use App\Models\PointDeVente;
use Livewire\Component;

class Place extends Component
{
    public $place;
    public function mount()
    {
        $this->place = PointDeVente::get();
    }
    public function render()
    {
        return view('livewire.guest.place');
    }
}
