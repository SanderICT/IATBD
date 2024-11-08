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
            $table->string("media")->default("/media/Locations/home1.jpg");

            // Specificeer een unieke naam voor de foreign key
            $table->foreign("owner", 'location_owner_unique_foreign') // Geef een unieke naam op
                  ->references("id")
                  ->on("users")
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('location', function (Blueprint $table) {
            // Verwijder de foreign key door de naam te gebruiken
            $table->dropForeign('location_owner_unique_foreign');
        });
        Schema::dropIfExists('location');
    }
};
