<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->smallIncrements('user_id');
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('nombre', 255) -> nullable();
            $table->string('apellido', 255) -> nullable();
            $table->string('biografia', 255) -> nullable();
            $table->string('libroPreferido', 255) -> nullable();
            $table->string('img', 255) -> nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
