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
            Schema::create('game_genres', function (Blueprint $table) {
                $table->unsignedBigInteger('app_id');
                $table->unsignedBigInteger('genre_id');

                $table->foreign('genre_id')->references('genre_id')->on('genres');
                $table->foreign('app_id')->references('app_id')->on('steam__games');

                $table->unique(['app_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_genres');
    }
};
