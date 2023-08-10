<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('path_logotipo')->nullable();
            $table->string('name_logotipo')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('pagina_web')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('escuelas');
    }
};
