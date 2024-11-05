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
        Schema::create('location_availability', function (Blueprint $table) {
            $table->string("location");
            $table->string("for");

            $table->foreign("location")->references("address")->on("location");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_availability', function (Blueprint $table) {
            $table->dropForeign('location_availability_location_foreign');
        });
        Schema::dropIfExists('location_availability');
    }
};
