<?php

namespace App\Http\Controllers;
use App\Models\Point;
use Illuminate\Http\Request;

class DashboardEarnedPointsController extends Controller
{
    public function index()
    {
        $points = Point::all(); // Retrieve all vouchers from the database
        return view('admin.dashboard-points', compact('points'));
    }
}
