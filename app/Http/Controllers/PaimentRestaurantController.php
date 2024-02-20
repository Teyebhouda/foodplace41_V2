<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PaimentRestaurant;
use App\Models\PaimentMethod;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

use App\Models\ClientRestaurat;
use App\Models\ProduitsRestaurants;
use App\Models\Command;

class PaimentRestaurantController extends Controller
{

    public function index()
    {
        $restaurant_id = env('Restaurant_id');

   
        // Retrieve a list of PaimentRestaurants
        $paimentMethods = PaimentRestaurant::where('restaurant_id', $restaurant_id)->paginate(10);
		
		
			// stats
			
		$clientCount = ClientRestaurat::where('restaurant_id', $restaurant_id)->count();
		$produitsCount = ProduitsRestaurants::where('restaurant_id', $restaurant_id) ->count();
		$commandeCount = Command::where('restaurant_id', $restaurant_id)->count();
		$NouveauCommandeCount = Command::where('restaurant_id', $restaurant_id)
            ->where('statut', 'Nouveau')
            ->count();

        return view('restaurant.paiment.index', compact('paimentMethods', 'clientCount','commandeCount', 'NouveauCommandeCount', 'produitsCount'));
    }

    public function create()
    {
        $Paiements = PaimentMethod::all();
        // You can implement a form to create a new PaimentRestaurant here
        return view('restaurant.paiment.create', compact('Paiements'));
    }

    public function store(Request $request)
    {

        $restaurant_id = env('Restaurant_id');

        
        
        
        $existingMethode= PaimentRestaurant::where('restaurant_id',$restaurant_id)->where('paiment_id',$request->type_methode)->first();
        if(!$existingMethode){
           
                $methodepaiement = new PaimentRestaurant();
                $methodepaiement->restaurant_id = $restaurant_id ;
                $methodepaiement->paiment_id = $request->type_methode;
               
                $methodepaiement->save();


              
            
          

            // Redirect to a success page or return a response as needed
            return redirect()->route('restaurant.paiment.index')
                ->with('success', 'méthode de Paiement ajoutée avec succès');

        } else{
           

            
            return redirect()->route('restaurant.paiment.index')
                ->with('error', 'cette méthode existe déja');
        }
        // Create a new PaimentRestaurant instance
      
    }
    
    public function show(PaimentRestaurant $paimentRestaurant)
    {
        // Show a single PaimentRestaurant
        return view('restaurant.paiment.show', compact('paimentRestaurant'));
    }

    public function edit( $id)
    {
        $paimentMethod = PaimentRestaurant::find($id);
    
        // You can implement a form to edit the PaimentRestaurant here
        return view('restaurant.paiment.edit', compact('paimentMethod'));
    }

    public function update(Request $request, PaimentRestaurant $paimentRestaurant)
    {
        // Validate the incoming request data
       /* $request->validate([
            'restaurant_id' => 'required',
            'paiment_id' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);*/
//dd($request);
        // Update the PaimentRestaurant instance with the new data
        $paimentRestaurant->update($request->all());

        // Redirect to a success page or return a response as needed
        return redirect()->route('restaurant.paiment.index')
            ->with('success', 'méthode de Paiement modifiée  avec succès');
    }

    public function destroy($id)
    {
        // Retrieve the PaimentRestaurant instance by its ID
        $paimentRestaurant = PaimentRestaurant::find($id);
    
        // Check if the PaimentRestaurant exists
        if (!$paimentRestaurant) {
            // Handle the case where the record is not found, e.g., show an error or redirect
        }
    
        // Delete the PaimentRestaurant instance
        $paimentRestaurant->delete();
    
        // Redirect to a success page or return a response as needed
        return redirect()->route('restaurant.paiment.index')
            ->with('success', 'Méthode de paiement supprimée avec succès');
    }
}
