<?php

namespace App\Livewire\Admin;

use App\Models\PointDeVente;
use Livewire\Component;

class ModificationPoint extends Component
{
    public $id;
    public string $nom = "";
    public string $ville = "";
    public string $code_postale = "";
    public function mount():void
    {
    
    $point_vente = PointDeVente::where('id',$this->id)->first();
    if(empty($point_vente))
    {
        $this->redirect("t-admin/dashboard",navigate:true);
    }else{
    $this->nom = $point_vente->nom;
    $this->ville = $point_vente->ville;
    $this->code_postale = $point_vente->code_postale;
    }
    }
    public function changePoint()
    {
        $this->validate([
            'nom'=>'required',
            'ville'=>'required',
            'code_postale'=>'required'
        ]);

        PointDeVente::where('id',$this->id)->update([
            'nom'=>$this->nom,
            'ville'=>$this->ville,
            'code_postale'=>$this->code_postale,
        ]);
        session()->flash('status','Modification reussite .');
        $this->redirect('/t-admin/les+points+de+vente',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.modification-point');
    }
}
