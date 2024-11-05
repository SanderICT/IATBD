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
        Schema::create('location', function (Blueprint $table) {
            $table->string("address")->unique();
            $table->string("city");
            $table->unsignedBigInteger("owner");

            $table->foreign("owner")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('location', function (Blueprint $table) {
            $table->dropForeign('location_owner_foreign');
        });
        Schema::dropIfExists('location');
    }
};
