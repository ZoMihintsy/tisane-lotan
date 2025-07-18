<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Commande as ModelsCommande;
use App\Models\PointDeVente;
use App\Models\Produit;
use Livewire\Component;

class Commande extends Component
{
    public $commande;
    public $produit;
    public $category;
    public $place;
    public function mount()
    {
        $this->commande = ModelsCommande::orderBy('created_at','desc')->get();
        $this->produit = Produit::get();
        $this->category = Category::get();
        $this->place = PointDeVente::get();

    }
    public function render()
    {
        return view('livewire.admin.commande');
    }
}
