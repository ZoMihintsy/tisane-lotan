<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\PointDeVente;
use App\Models\Produit;
use Livewire\Component;

class Dashboard extends Component
{
    public $produit;
    public $category;
    public $place;
    public $commentaire;
    public $commande;
    public function mount()
    {
        $this->produit = Produit::count();
        $this->category = Category::count();
        $this->place = PointDeVente::count();
        $this->commentaire = Commentaire::count();
        $this->commande = Commande::count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
