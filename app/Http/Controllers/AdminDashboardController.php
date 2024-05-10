<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User; 
use App\Models\Voucher;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total Users
        $totalUsers = User::count();

        // Total Member Income
        $totalMemberIncome = $totalUsers * 200;

        // Total Vouchers Income
        // Assuming you have a Voucher model and a 'price' column in your vouchers table
        $totalVouchersIncome = Voucher::sum('price');

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalMemberIncome' => $totalMemberIncome,
            'totalVouchersIncome' => $totalVouchersIncome,
        ]);
    }
}