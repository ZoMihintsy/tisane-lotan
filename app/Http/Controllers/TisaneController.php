<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\PointDeVente;
use App\Models\Produit;
use Illuminate\Http\Request;

class TisaneController extends Controller
{
    //
    public function delete_point(PointDeVente $id)
    {
        $id->delete();
        session()->flash('status','Suppression du point de vente fait avec succès .');
        return redirect('/t-admin/les+points+de+vente');
    }
    public function delete_produit(Produit $id)
    {
        $id->delete();
        session()->flash('status','Suppression du produit fait avec succès .');
        return redirect('/t-admin/ajoute+de+produit');
    }
    public function delete_category(Category $id)
    {
        # code...
        
        Produit::where('category_id',$id->id)->delete();
        $id->delete();
        session()->flash('status','Suppression du catégorie fait avec succès .');
        return redirect('/t-admin/Ajoute+des+categories');
    }
    public function delete_coms(Commentaire $id)
    {
        $id->delete();
        return back();
    }

    public function confirm_commande(Commande $id)
    {
        $id->update([
            'type'=>'valid'
        ]);
        return back();
    }
}
