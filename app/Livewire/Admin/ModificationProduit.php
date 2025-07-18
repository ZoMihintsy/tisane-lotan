<?php

namespace App\Livewire\Admin;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithFileUploads;

class ModificationProduit extends Component
{
    use WithFileUploads;
    public $id;
    public string $nom = "";
    public string $description = "";
    public $photo;
    public $tof;
    public string $quantiter ="";
    public function mount()
    {
        $produit = Produit::where('id',$this->id)->first();
        if($produit)
        {
        
        $preg = str_replace('<br />',"",$produit->description);
        $this->description = $preg;
        $this->nom = $produit->nom;
        $this->photo = $produit->photo;
        $this->tof = $produit->photo;
        $this->quantiter = $produit->quantiter;
    }else{
        $this->redirect('/t-admin/dashboard',navigate:true);

    }

    }
    public function saveChange()
    {
        $this->validate([
            'nom'=>'required',
            'description'=>'required'
        ]);
        if(empty($this->photo) || $this->tof == $this->photo)
        {
            $photo = $this->tof;
        }else{
            $this->photo->store('public');
            $photo = $this->photo->store();
        }
        Produit::where('id',$this->id)->update([
            'nom'=>$this->nom,
            'description'=>nl2br($this->description),
            'photo'=>$photo,
            'quantiter'=>$this->quantiter
        ]);
            $this->redirect('/t-admin/ajoute+de+produit',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.modification-produit');
    }
}
