<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('contacto1');
            $table->string('email1');
            $table->string('telefono1');
            $table->string('descripcion');
            /* $table->foreignId('servicios_id')->constrained(); */
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
