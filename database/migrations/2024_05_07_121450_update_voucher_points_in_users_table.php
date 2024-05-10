<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Voucher;

class UpdateVoucherPointsInUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop default value if set
            $table->integer('voucher_points')->default(0)->change();
        });

        // Update voucher points for existing users
        $users = User::all();
        foreach ($users as $user) {
            $voucherPoints = Voucher::where('user_id', $user->id)->sum('points');

            // Debug output
            echo "User ID: " . $user->id . ", Voucher Points: " . $voucherPoints . PHP_EOL;

            $user->update(['voucher_points' => $voucherPoints]);
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
