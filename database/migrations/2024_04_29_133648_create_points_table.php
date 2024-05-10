<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->integer('total_points')->default(0);
            $table->string('carbon_points')->default('red');
            $table->string('renewable_points')->default('red');
            $table->string('waste_points')->default('red');
            $table->string('water_points')->default('red');
            $table->string('supply_points')->default('red');
            $table->string('biodiversity_points')->default('red');
            $table->string('energy_points')->default('red');
            $table->string('products_points')->default('red');
            $table->string('transportation_points')->default('red');
            $table->string('packaging_points')->default('red');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('points', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint
        });
        
        Schema::dropIfExists('points'); // Drop the table
    }
};
