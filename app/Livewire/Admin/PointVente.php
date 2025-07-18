<?php

namespace App\Livewire\Admin;

use App\Models\PointDeVente;
use Livewire\Component;

class PointVente extends Component
{
    public string $nom = "";
    public string $ville = "";
    public string $code_postale = "";

    public function saved()
    {
        $this->validate([
            'nom'=>['required','unique:'.PointDeVente::class],
            'ville'=>'required',
            'code_postale'=>'required'
        ]);
        PointDeVente::create([
            'nom'=>$this->nom,
            'ville'=>$this->ville,
            'code_postale'=>$this->code_postale
        ]);
        $this->nom = "";
        $this->ville = "";
        $this->code_postale = "";
        session()->flash('status','Point de vente bien enregistrer');

    }
    public function render()
    {
        return view('livewire.admin.point-vente');
    }
}
