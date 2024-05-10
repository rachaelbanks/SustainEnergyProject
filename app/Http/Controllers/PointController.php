<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function create()
    {
        // Check if a Point entry exists for the current user
        $userId = auth()->id();
        $point = Point::where('user_id', $userId)->first();

        // If a Point entry exists, pass the data to the view
        return view('earn-points', compact('point'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'carbon-rating' => 'required|in:red,orange,green',
            'renewable-rating' => 'required|in:red,orange,green',
            'waste-rating' => 'required|in:red,orange,green',
            'water-rating' => 'required|in:red,orange,green',
            'supply-rating' => 'required|in:red,orange,green',
            'biodiversity-rating' => 'required|in:red,orange,green',
            'energy-rating' => 'required|in:red,orange,green',
            'product-rating' => 'required|in:red,orange,green',
            'transportation-rating' => 'required|in:red,orange,green',
            'packaging-rating' => 'required|in:red,orange,green',
        ]);

        $user_id = auth()->id();

        // Check if a Point entry exists for the current user
        $point = Point::where('user_id', $user_id)->first();

        // If a Point entry exists, update the values
        // Otherwise, create a new Point instance
        if ($point) {
            $point->update([
                'carbon_points' => $request->input('carbon-rating'),
                'renewable_points' => $request->input('renewable-rating'),
                'waste_points' => $request->input('waste-rating'),
                'water_points' => $request->input('water-rating'),
                'supply_points' => $request->input('supply-rating'),
                'biodiversity_points' => $request->input('biodiversity-rating'),
                'energy_points' => $request->input('energy-rating'),
                'products_points' => $request->input('product-rating'),
                'transportation_points' => $request->input('transportation-rating'),
                'packaging_points' => $request->input('packaging-rating'),
            ]);
        } else {
            Point::create([
                'user_id' => $user_id,
                'carbon_points' => $request->input('carbon-rating'),
                'renewable_points' => $request->input('renewable-rating'),
                'waste_points' => $request->input('waste-rating'),
                'water_points' => $request->input('water-rating'),
                'supply_points' => $request->input('supply-rating'),
                'biodiversity_point' => $request->input('biodiversity-rating'),
                'energy_points' => $request->input('energy-rating'),
                'products_points' => $request->input('product-rating'),
                'transportation_points' => $request->input('transportation-rating'),
                'packaging_points' => $request->input('packaging-rating'),
            ]);
        }

        return redirect()->route('my-points')->with('success', 'Points saved successfully.');
    }
}