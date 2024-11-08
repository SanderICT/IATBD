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
        Schema::create('pet_sitting_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('pending'); // Of 'accepted', 'rejected', etc.
            $table->text('review')->nullable(); // Recensie kan leeg zijn
            $table->timestamps();

            // Voeg de foreign keys toe
            $table->foreign('animal_id')->references('animalID')->on('animal')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_sitting_requests');
    }
};
