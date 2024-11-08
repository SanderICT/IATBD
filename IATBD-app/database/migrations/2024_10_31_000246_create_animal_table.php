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
        Schema::create('animal', function (Blueprint $table) {
            $table->id("animalID");
            $table->string("name");
            $table->integer("age");
            $table->string("kind");
            $table->decimal('payment', 5, 2);
            $table->integer("durationInHours");
            $table->unsignedBigInteger("owner");
            $table->longText("note")->nullable();
            $table->string("media")->default("/media/Animals/Dog_Breeds.jpg");
            
            // Voeg timestamps toe
            $table->timestamps();
        
            // Voeg de 'is_accepted' kolom toe
            $table->boolean('is_accepted')->default(false); 
            
            // Definieer de foreign keys
            $table->foreign("kind")->references("kind")->on("animal_species");
            $table->foreign("owner")->references('id')->on("users");
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('animal', function (Blueprint $table) {
        $table->dropForeign('animal_kind_foreign');
        $table->dropForeign('animal_owner_foreign');
        $table->dropColumn('is_accepted');
    });
    Schema::dropIfExists('animal');
}

};
