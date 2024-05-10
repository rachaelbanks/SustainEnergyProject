<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Voucher;
use App\Models\User;
use App\Models\UserCardDetail;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function showVouchersForm()
    {
        return view('vouchers');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required|integer|min:1',
        ]);
    
        // Calculate the price based on points
        $price = $request->input('points') * 10;
    
        // Get the currently authenticated user's ID
        $user_id = auth()->user()->id;
    
        // Add the calculated price and user_id to the request data
        $requestData = $request->all();
        $requestData['price'] = $price;
        $requestData['user_id'] = $user_id;
    
        // Now you can validate and store the data
        $request->merge($requestData);
    
        $request->validate([
            'user_id' => 'required',
            'price' => 'required|integer|min:10',
            'points' => 'required|integer|min:1',
        ]);
    
        $voucher = Voucher::create($requestData);

        // Update the associated user's voucher points
        $voucher->user->updateVoucherPoints();
    
        return Redirect::route('my-points')->with('success', 'Voucher purchased successfully!');
    }


        // Displaying the user's points
        public function showPurcaseView()
        {
            // Get the authenticated user
            $user = Auth::user();
            
            // Retrieve card details for the authenticated user
            $userCardDetail = UserCardDetail::where('user_id', $user->id)->first();
            
            // Pass user and userCardDetail data to the view
            return view('vouchers', compact('user', 'userCardDetail'));
        }
}

