<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('new_id');

            $table-> string('title', 255);
            $table-> text('subtitle') -> nullable();
            $table -> string('img', 255) -> nullable();
            $table-> string('imgDescription', 100);
            $table-> text('info');
            $table-> string('author', 100);
            $table-> date('publishDate');
            $table-> string('link');
            
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
        Schema::dropIfExists('news');
    }
}
