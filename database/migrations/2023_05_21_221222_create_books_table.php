<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table-> string('title', 100);
            $table-> date('publishDate');
            $table-> unsignedInteger(('price'));
            $table-> text('synopsis');
            $table-> unsignedInteger(('pages'));
            $table-> string('language', 100)-> nullable();
            $table-> string('editorial', 100);
            $table-> string('author', 100);
            $table -> string('img', 255) -> nullable();
            $table-> string('img_description', 100);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
