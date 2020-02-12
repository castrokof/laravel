<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zona',45);
            $table->integer('poliza')->unique();
            $table->string('direccion',255);
            $table->string('recorrido',255);
            $table->integer('year');
            $table->integer('mes');
            $table->integer('lote');
            $table->integer('consecutivo');
            $table->integer('consecutivo_int');
            $table->string('usuario',50)->nullable();
            $table->string('estado',50);
            $table->integer('estado_id');
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
        Schema::dropIfExists('asignar');
    }
}
