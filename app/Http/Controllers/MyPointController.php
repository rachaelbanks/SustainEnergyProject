<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Point; 

class MyPointController extends Controller
{
    // Displaying the user's points
    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Retrieve points for the authenticated user
        $points = Point::where('user_id', $user->id)->first();
        
        // Retrieve vouchers for the authenticated user
        $vouchers = Voucher::where('user_id', $user->id)->get();
        
        // Pass user, points, and vouchers data to the view
        return view('my-points', compact('user', 'points', 'vouchers'));
    }
}
