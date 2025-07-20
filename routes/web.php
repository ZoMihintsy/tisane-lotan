<?php

use App\Http\Controllers\TisaneController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('t-admin/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/lang/{lang}',function (string $lang){
        App::setLocale($lang);
        Session::put('locale', $lang);
        App::setLocale(Session::get('locale'));
    
        // dd(Session::get('locale'));
        return Redirect::back();
    
    })->name('change.lang');
    
    Route::view('t-admin/ajoute+de+produit','admin.addProduit')
    ->middleware(['auth','verified'])
    ->name('t.produit');
    
    Route::view('t-admin/point+de+vente','admin.pointVente')
    ->middleware(['auth','verified'])
    ->name('t.point');
    
    Route::view('t-admin/les+points+de+vente','admin.points')
    ->middleware(['auth','verified'])
    ->name('t.points');
    
    Route::view('t-admin/Modifiation+du+point+de+vente/q={id}','admin.modificationPoint')
    ->middleware(['auth','verified'])
    ->name('modification.point');
    
    Route::get('t-admin/suppression+du+point+de+vente/q={id}',[TisaneController::class, 'delete_point'])
    ->middleware(['auth','verified'])
    ->name('delete.point');
    // category route
    
    Route::view('t-admin/Ajoute+des+categories','admin.category')
    ->middleware(['auth','verified'])
    ->name('t.category');

    //produit 
    Route::view('t-admin/Modification+du+produit/q={id}','admin.modificationProduit')
    ->middleware(['auth','verified'])
    ->name('modification.produit');

    Route::get('t-admin/Suppression+du+produit/q={id}',[TisaneController::class, 'delete_produit'])
    ->middleware(['auth','verified'])
    ->name('delete.produit');

    Route::view('produit','guest.produit')
    ->middleware('guest')
    ->name('produit');

    Route::view('Categories','guest.category')
    ->middleware('guest')
    ->name('category');

    Route::view('t-admin/Moification+du+catégorie/q={id}','admin.modificationcategory')
    ->middleware(['auth','verified'])
    ->name('modif.category');

    Route::view('Point+de+vente','guest.place')
    ->middleware('guest')
    ->name('place');
    
    // suppression.point
    Route::get('t-admin/Suppression+du+catégorie/q={id}',[TisaneController::class, 'delete_category'])
    ->middleware(['auth','verified'])
    ->name('suppression.point');

    //commande 
    Route::view('t-admin/les+commandes','admin.commande')
    ->middleware(['auth','verified'])
    ->name('commande');
    Route::get('t-admin/Commande+confirmer/commande={id}',[TisaneController::class, 'confirm_commande'])
    ->middleware(['auth','verified'])
    ->name('confirm.commande');
    //commentaire 
    Route::view('t-admin/les+commentaires','admin.commentaire')
    ->middleware(['auth','verified'])
    ->name('commentaire');

    Route::get('Suprimer+le+commentaire/q={id}',[TisaneController::class, 'delete_coms'])
    ->middleware(['auth','verified'])
    ->name('supprime.coms');



require __DIR__.'/auth.php';
