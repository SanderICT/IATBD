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
        Schema::create('searching', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("owner");
            $table->unsignedBigInteger("for");
            $table->dateTime("from");
            $table->dateTime("to");
            $table->double("payment", 5, 2);
            $table->timestamps();

            $table->foreign("owner")->references("id")->on("users");
            $table->foreign("for")->references("animalID")->on("animal");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('searching', function (Blueprint $table) {
            $table->dropForeign('searching_owner_foreign');
            $table->dropForeign('searching_for_foreign');
        });
        Schema::dropIfExists('searching');
    }
};
