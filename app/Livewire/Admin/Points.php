<?php

namespace App\Livewire\Admin;

use App\Models\PointDeVente;
use Livewire\Component;

class Points extends Component
{
    public $points;
    public string $nom = "";
    public $noms;
    public string $valeur = "";
    public function mount()
    {
        $this->points = PointDeVente::get();
    }
    public function change()
    {
        if(!empty($this->valeur))
        {
            $this->noms = PointDeVente::where('id',$this->valeur)->first();
        }
    }
    public function render()
    {
        return view('livewire.admin.points');
    }
}
