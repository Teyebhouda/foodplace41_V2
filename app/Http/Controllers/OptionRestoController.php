<?php

namespace App\Http\Controllers;
use App\Models\OptionsRestaurant;
use App\Models\familleOptionsRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Client;
use App\Models\ClientRestaurat;
use App\Models\ProduitsRestaurants;
use App\Models\Command;


class OptionRestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant_id = env('Restaurant_id');

 
        $options = OptionsRestaurant::where('restaurant_id', $restaurant_id)->get();
			
			// stats
			
		$clientCount = ClientRestaurat::where('restaurant_id', $restaurant_id)->count();
		$produitsCount = ProduitsRestaurants::where('restaurant_id', $restaurant_id) ->count();
		$commandeCount = Command::where('restaurant_id', $restaurant_id)->count();
		$NouveauCommandeCount = Command::where('restaurant_id', $restaurant_id)
            ->where('statut', 'Nouveau')
            ->count();
			
        return view('restaurant.options.index', compact('options', 'clientCount','commandeCount', 'NouveauCommandeCount', 'produitsCount'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $restaurant_id = env('Restaurant_id');

 
        $familleOptions = FamilleOptionsRestaurant::where('restaurant_id', $restaurant_id)->get();;
        $selectedFamilleOption = $request->input('famille_option_id');
        return view('restaurant.options.create', compact('familleOptions', 'selectedFamilleOption'));
 
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $restaurant_id = env('Restaurant_id');

 
      

        $option = new OptionsRestaurant();
        $option->famille_option_id_rest = $request->input('famille_option_id');
        $option->nom_option = $request->input('nom_option');
        $option->prix = $request->input('prix');
       $option->restaurant_id = $restaurant_id;
        $option->save();
 $options = OptionsRestaurant::where('famille_option_id_rest', $request->input('famille_option_id'))->get();
        return view('restaurant.options.index', compact('options'))->with('success', 'Option ajoutée avec succès!');
        //return redirect()->route('restaurant.options.index')->with('success', 'Option ajoutée avec succès!');
  
     }
    public function remove(OptionsRestaurant $option)
    {
        // Perform the removal logic here
        $option->delete();

        return redirect()->back()->with('success', 'Option supprimée avec succès!');
    }
    public function edit(OptionsRestaurant $option)
    {  $userId = Auth::id();
        $user = User::find($userId);
        if ($user) {
        
        $restaurant = $user->restaurant;
        $familleOptions = familleOptionsRestaurant::where('restaurant_id', $restaurant_id)->get();
        return view('restaurant.options.edit', compact('option', 'familleOptions'));
        }
 }
    
    public function update(Request $request, OptionsRestaurant $option)
    {
       
    
        $option->famille_option_id_rest = $request->input('famille_option_id');
        $option->nom_option = $request->input('nom_option');
        $option->prix = $request->input('prix');
        $option->save();
    $options = OptionsRestaurant::where('famille_option_id_rest', $request->input('famille_option_id'))->get();
        return view('restaurant.options.index', compact('options'))->with('success', 'Option modifiée avec succès!');
       // return redirect()->back()->with('success', 'Option modifiée avec succès!');
    }
    


}
