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
        Schema::create('books_have_genres', function (Blueprint $table) {

            $table->foreignId('book_id')->constrained('books', 'book_id');
            $table->unsignedTinyInteger('genre_id');
            $table->foreign('genre_id')->references('genre_id')->on('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_have_genres');
    }
};