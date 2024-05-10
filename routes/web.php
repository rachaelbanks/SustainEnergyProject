<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\MyPointController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UserCardDetailController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardEarnedPointsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/earn-points', function () {
    return view('earn-points');
});

Route::get('/my-points', function () {
    return view('my-points');
});


// Vouchers routes
Route::get('/vouchers', [VoucherController::class, 'showVouchersForm']);
Route::post('/vouchers', [VoucherController::class, 'store'])->name('vouchers.store');
Route::get('/vouchers', [VoucherController::class, 'showPurcaseView']);


// Earn Points Routes
Route::get('/earn-points', [PointController::class, 'create'])->name('earn-points.create');
Route::post('/earn-points/store', [PointController::class, 'store'])->name('earn-points.store');

// My Points
Route::get('/my-points', [MyPointController::class, 'show'])->name('my-points');

// Download Certificates
Route::get('/my-points/{filename}', [DownloadController::class, 'downloadPDF'])->name('download.pdf');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    // Card details routes
    Route::get('/profile/card-details', [UserCardDetailController::class, 'edit'])->name('profile.card-details.edit');
    Route::post('/profile/card-details', [UserCardDetailController::class, 'update'])->name('profile.card-details.update');
    Route::patch('/profile/card-details', [UserCardDetailController::class, 'update'])->name('profile.card-details.update');

});

Route::middleware('guest:admin')->prefix('admin')->group( function () {
    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'store']);
    Route::get('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'create'])->name('admin.register');
    Route::post('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'store']);
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users-dashboard', [App\Http\Controllers\DashboardUserController::class, 'index']);
    Route::get('/vouchers-dashboard', [App\Http\Controllers\DashboardVoucherController::class, 'index']);
    Route::get('/points-dashboard', [App\Http\Controllers\DashboardEarnedPointsController::class, 'index']);
});

// Redirect /admin to admin.login if not logged in
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

require __DIR__.'/auth.php';
