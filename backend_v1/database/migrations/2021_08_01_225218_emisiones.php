<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Emisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisiones', function (Blueprint $table) {
            $table->id();  
            $table->string('nombre');
            $table->string('apellido');
            $table->string('mail');
            $table->string('ip');
            $table->string('metadata');
            $table->integer('rela_cupon');
            $table->string('data');
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
        //
    }
}
