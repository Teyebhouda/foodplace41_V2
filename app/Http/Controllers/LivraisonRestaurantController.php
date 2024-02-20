<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LivraisonRestaurant;
use App\Models\LivraisonMethod;
use App\Models\User;
use App\Models\Client;
use Auth;
use Illuminate\Http\Request;

use App\Models\ClientRestaurat;
use App\Models\ProduitsRestaurants;
use App\Models\Command;

class LivraisonRestaurantController extends Controller
{

    public function index()
{
    $restaurant_id = env('Restaurant_id');

    $livraisonMethods  = LivraisonRestaurant::where('restaurant_id', $restaurant_id)
    ->paginate(10);
		
		// stats
			
		$clientCount = ClientRestaurat::where('restaurant_id', $restaurant_id)->count();
		$produitsCount = ProduitsRestaurants::where('restaurant_id', $restaurant_id) ->count();
		$commandeCount = Command::where('restaurant_id', $restaurant_id)->count();
		$NouveauCommandeCount = Command::where('restaurant_id', $restaurant_id)
            ->where('statut', 'Nouveau')
            ->count();

	
    return view('restaurant.livraison.index', compact('livraisonMethods', 'clientCount','commandeCount', 'NouveauCommandeCount', 'produitsCount'));

  
}

public function create()
{
    $users = Client::all();
    $livraisonMethods = LivraisonMethod::all();

    return view('restaurant.livraison.create', compact('users', 'livraisonMethods'));
}



public function store(Request $request)
{
   /* $request->validate([
        'restaurant_id' => 'required|exists:users,id',
        'livraison_id' => 'required|exists:livraisons,id',
    ]);*/


   
    
    $restaurant_id = env('Restaurant_id');

    
    $existingMethode= LivraisonRestaurant::where('restaurant_id',$restaurant_id)->where('livraison_id',$request->methode_livraison)->first();
    if(!$existingMethode){
       
    $livraisonRestaurant = new LivraisonRestaurant();
    $livraisonRestaurant->restaurant_id = $restaurant_id;
    $livraisonRestaurant->livraison_id = $request->input('methode_livraison');
    $livraisonRestaurant->save();

    return redirect()->route('restaurant.livraison.index')->with('success', ' Methode de livraison ajoutée avec succès.');
}
else{
    return redirect()->route('restaurant.livraison.index')->with('error', ' Methode de livraison existe déja.');
}

    }


    public function edit($id)
    {
        $livraisonRestaurant = LivraisonRestaurant::findOrFail($id);
        return view('restaurant.livraison.edit', compact('livraisonRestaurant'));
    }

    public function update(Request $request, $id)
    {
      

        $restaurant_id = env('Restaurant_id');

        $livraisonRestaurant = LivraisonRestaurant::findOrFail($id);
        $livraisonRestaurant->restaurant_id = $restaurant_id;
        $livraisonRestaurant->methode = $request->input('type_methode');
        $livraisonRestaurant->save();

        return redirect()->route('restaurant.livraison.index')->with('success', ' Méthode de Livraison Modifiée Avec succès');
    }

    public function destroy(LivraisonRestaurant $LivraisonMethod)
    {
      //  $livraisonRestaurant = LivraisonRestaurant::findOrFail($id);
        $LivraisonMethod->delete();
        return redirect()->route('restaurant.livraison.index')->with('danger', ' Méthode de Livraison supprimée Avec succès');
    }
}
