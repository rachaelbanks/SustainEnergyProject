<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class DashboardVoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all(); // Retrieve all vouchers from the database
        return view('admin.dashboard-vouchers', compact('vouchers'));
    }
}
