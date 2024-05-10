<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Point;
use App\Models\Voucher;
use App\Models\UserCardDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'card_number' => ['required', 'string'], // Add validation rules for card details
            'card_expiry' => ['required', 'string'],
            'card_cvv' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ensure that the user has been successfully created before proceeding
        if ($user) {
            // Associate the newly created user ID with the card details
            $userCardDetails = UserCardDetail::create([
                'user_id' => $user->id,
                'card_number' => $request->card_number,
                'card_expiry' => $request->card_expiry,
                'card_cvv' => $request->card_cvv,
            ]);

            // Check if card details are created successfully
            if ($userCardDetails) {
                // Create points record for the user with default values
                $points = new Point();
                $points->user_id = $user->id;
                $points->carbon_points = 'red';
                $points->renewable_points = 'red';
                $points->waste_points = 'red';
                $points->water_points = 'red';
                $points->supply_points = 'red';
                $points->biodiversity_points = 'red';
                $points->energy_points = 'red';
                $points->products_points = 'red';
                $points->transportation_points = 'red';
                $points->packaging_points = 'red';
                $points->save();

                // Create voucher record for the user with default values
                $voucher = new Voucher();
                $voucher->user_id = $user->id;
                $voucher->points = 0;
                $voucher->save();

                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            } else {
                // Handle card details creation failure
                $user->delete(); // Rollback the user creation
                return back()->withErrors(['card_details' => 'Failed to create card details.']);
            }
        } else {
            // Handle user creation failure
            return back()->withErrors(['registration' => 'Failed to register user.']);
        }
    }
}
