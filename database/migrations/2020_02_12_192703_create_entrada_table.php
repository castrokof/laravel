<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zona',45);
            $table->integer('poliza')->unique();
            $table->string('direccion',255);
            $table->string('recorrido',255);
            $table->string('medidor',50);
            $table->string('nombre',255);
            $table->integer('year');
            $table->integer('mes');
            $table->integer('lote');
            $table->integer('consecutivo');
            $table->integer('consecutivo_int');
            $table->integer('ruta');
            $table->integer('tope');
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
        Schema::dropIfExists('entrada');
    }
}
