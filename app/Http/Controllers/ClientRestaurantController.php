<?php

namespace App\Http\Controllers;
use App\Models\ClientRestaurat;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientRestaurantController  extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
       
        $restaurant_id = env('Restaurant_id');
        $restaurant = $user->restaurant;

        $clients = ClientRestaurat::where('restaurant_id', $restaurant_id)->paginate(10);
		


        
        return view('restaurant.clients.index', compact('clients'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('restaurant.clients.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'ville' => 'required',
            'Address' => 'required',
            'postalcode' => 'required',
            'phoneNum1' => 'required',
            'Email' => 'required|email|unique:clientRestaurant,Email',
            'password' => 'required|min:6',
        ]);
        $validatedData['password'] = Hash::make($request->input('password'));
ClientRestaurat::create($validatedData);

      
        return redirect()->route('restaurant.clients.index')->with('success', 'restaurant ajouté avec succès.');
    }

    // Display the specified resource.
    public function show(ClientRestaurat $client)
    {
        return view('clients.show', compact('client'));
    }

    // Show the form for editing the specified resource.
    public function edit(ClientRestaurat $client)
    {
        return view('restaurant.clients.edit', compact('client'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, ClientRestaurat $client)
    {
        $validatedData = $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'ville' => 'required',
            'Address' => 'required',
            'postalcode' => 'required',
            'phoneNum1' => 'required',
            'Email' => 'required|email|unique:clientRestaurant,Email,'.$client->id,
            'password' => 'required|min:6',
        ]);

        $client->update($validatedData);
        return redirect()->route('restaurant.clients.index')->with('success', 'Restaurant modifié avec succès.');
    }

    // Remove the specified resource from storage.
    public function destroy(ClientRestaurat $client)
    {
        $client->delete();
        return redirect()->route('restaurant.clients.index')->with('success', 'Restaurant supprimé avec succès.');
    }
}
