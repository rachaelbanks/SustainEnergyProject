<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCardDetail;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserCardDetailController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $cardDetails = UserCardDetail::where('user_id', $user->id)->first(); // Retrieve user's card details

        return view('profile.edit-card', compact('user', 'cardDetails'));

    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate incoming data
        $request->validate([
            'card_number' => 'required|string',
            'cvv' => 'required|string',
            'expiry_date' => 'required|string',
        ]);

        // Find or create card details
        $cardDetails = UserCardDetail::firstOrNew(['user_id' => $user->id]);
        
        // Update card details
        $cardDetails->fill([
            'card_number' => $request->input('card_number'),
            'cvv' => $request->input('cvv'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        $cardDetails->save();

        // Redirect back with success message
        return Redirect::route('profile.card-details.edit')->with('success', 'Card details changed successfully!');
    }
}
