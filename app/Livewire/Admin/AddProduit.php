<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduit extends Component
{
    use WithFileUploads;
    public $photo;
    public string $categorie = "";
    public string $description = "";
    public string $nom = "";
    public $produire;
    public string $search = "";
    public string $pack = "";
    public string $nbrpack = "";
    public function mount()
    {
        $this->produire = Produit::orderBy('created_at','asc')->get();
    }
    public function searchs()
    {
        if(!empty($this->search))
        {
            $this->produire = Produit::where('nom',$this->search)->get();
        }else{
            
            $this->produire = Produit::orderBy('created_at','asc')->get();
        }
    }
    public function addPack()
    {
        if(empty($this->categorie)){
            $this->pack = "";
        }else{
          $pack = Category::where('id',$this->categorie)->first();
        $this->pack = $pack->type_package;  
        }
        
    }
    public function saveProduit()
    {
        $this->validate([
            'photo'=>['required'],
            'description'=>['required','max:2000'],
            'categorie'=>'required',
            'nom'=>'required',
        ]);
        $this->photo->store('public');
        if(empty($this->nbrpack))
        {
            $nbr = "";
        }else{
            $nbr = $this->nbrpack;
        }
        $photo = $this->photo->store();
        Produit::create([
        'photo'=>$photo,
        'category_id'=>$this->categorie,
        'description'=>nl2br($this->description),
        'nom'=>$this->nom,
        'quantiter'=>$nbr,
        ]);
        $this->redirect("/t-admin/ajoute+de+produit",navigate:true);
    }
    public function render()
    {
        $category = Category::get();
        $produire = Produit::orderBy('created_at','asc')->get();
        return view('livewire.admin.add-produit',['category'=>$category, 'produire'=>$produire]);
    }
}
