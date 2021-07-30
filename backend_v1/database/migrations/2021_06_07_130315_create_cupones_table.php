<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupones', function (Blueprint $table) {
            $table->id();
            
           
            $table->string('provincia');
            $table->string('proveedor');
            $table->string('categoria');
            $table->string('descripcion');
            $table->string('descripcion_larga');
            
            $table->string('cuit_empresa')->default(null)->nullable;
            $table->string('uuid')->unique()->default(DB::raw('(UUID())'));            

            $table->datetime('fecha_inicio')->default(null)->nullable;
            $table->datetime('fecha_fin')->default(null)->nullable;

            $table->string('estado')->default(null)->nullable;
            $table->json('metadata');            
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
        Schema::dropIfExists('cupones');
    }
}
