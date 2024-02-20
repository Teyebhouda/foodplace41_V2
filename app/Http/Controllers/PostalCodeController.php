<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientPostalCode;
use App\Models\Client;

class PostalCodeController extends Controller
{
    public function validatePostalCode(Request $request)
    {
        $restaurant_id = env('Restaurant_id');

        
        $code = $request->input('postal_code');
        // Check if the code exists in the database
        $codeExists = ClientPostalCode::where('postal_code', $code)
        ->where('client_id', $restaurant_id)
        ->exists();
        
     if (!$codeExists) {
            $phoneNum1 = Client::where('id', $restaurant_id)->value('phoneNum1');
            
            $email = Client::where('id', $restaurant_id)->first()->user->email;
        
            session()->put('phoneNum1', $phoneNum1);
            session()->put('email', $email);
        }
        // Set the session variable based on the code validation
        session()->put('showPopup', $codeExists);
        // Redirect back to the previous page
        return redirect()->back();
    }

    
}
