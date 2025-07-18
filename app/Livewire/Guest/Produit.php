<?php

namespace App\Livewire\Guest;

use App\Mail\Commande;
use App\Mail\Commands;
use App\Models\Category;
use App\Models\Commande as ModelsCommande;
use App\Models\PointDeVente;
use App\Models\Produit as ModelsProduit;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Produit extends Component
{
    public $produit;
    public $paniers;
    public $emplacements;
    public string $name = "";
    public string $email = "";
    public string $emplacement ="";
    public string $crenaux ="";
    public $types;
    public $category;
    public $_produit;
    public $place;
    public $category_type;
    public $quantiter;
    public $trie;

    public $n = 0;
    public $in = 0;
    public function mount()
    {
        $this->produit = ModelsProduit::orderBy('updated_at','desc')->get();
        $this->emplacements = PointDeVente::get();
        $this->types = Category::get();
        
    }
    public function trier()
    {
        if(!empty($this->trie))
        {
            $this->produit = ModelsProduit::where('category_id',$this->trie)->get();
        }else{
            $this->produit = ModelsProduit::orderBy('updated_at','desc')->get();
        }
    }
    public function panier()
    {
        
        if($this->n >= 2)
        {
            $this->n = 0;
            $this->paniers = "";
        }else{
           $this->n++;
           $this->in = 0; 
        }
        if(!empty($this->paniers))
        {
            $prod = ModelsProduit::where('id',$this->paniers)->first();
            $this->category_type = Category::where('id',$prod->category_id)->first();
            // dd($this->category_type);
        }
        

    }
    public function render()
    {
        return view('livewire.guest.produit');
    }
    public function del()
    {
        $this->name = "";
        $this->paniers = "";
        $this->email = "";
        $this->emplacement = "";
        $this->n = 0;
        $this->in = 0;
    }
    public function commander()
    {
        $produit = ModelsProduit::where('id',$this->paniers)->first();
        if(!empty($produit->quantiter))
        {
            $nombre = (int) $produit->quantiter;
        }else{
            $nombre = PHP_INT_MAX;
        }
        $this->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'emplacement' => 'required',
            'crenaux'=>'required',
            'quantiter'=>['required','integer','min:1','max:'.$nombre]
        ]);
        // dd($this->paniers);
            // $produit = ModelsProduit::where('id',$this->paniers)->first();
            // $category = Category::where('id',$produit->category_id)->first();
            // $pointDeVente = PointDeVente::where('id',$this->emplacement)->first();
            $panie = $this->paniers;
            $emplace = $this->emplacement;
            $nom = $this->name;
            $date = date('d/m/y ',strtotime($this->crenaux));
            $heure = date('H:i ',strtotime($this->crenaux));
            ModelsCommande::create([
                'nom'=>$this->name,
                'email'=>$this->email,
                'crenaux'=>$this->crenaux,
                'produit_id'=>$this->paniers,
                'category_id'=>$produit->category_id,
                'place_id'=>$this->emplacement,
                'package'=>$this->quantiter,
            ]);
            Mail::to($this->email)
                ->queue(new Commande($panie , $emplace , $date, $heure));
            Mail::to(config('app.admin_email'))
            ->queue(new Commands($panie, $emplace, $nom, $date, $heure));
            ModelsProduit::where('id',$this->paniers)->update([
                'quantiter'=>$produit->quantiter - $this->quantiter
            ]);
            $this->name = "";
            $this->email = "";
            $this->emplacement = "";
            $this->paniers = "";
            $this->in = 1;
    }
}
