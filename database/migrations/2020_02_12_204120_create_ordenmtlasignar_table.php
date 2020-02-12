<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenmtlasignarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenmtlasignar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ordenmtl_id');
            $table->foreign('ordenmtl_id', 'fk_ordenmtlasignar_ordenesmtl')->references('id')->on('ordenesmtl')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('asignar_id');
            $table->foreign('asignar_id', 'fk_ordenmtlasignar_asignar')->references('id')->on('asignar')->onDelete('restrict')->onUpdate('restrict');
            $table->string('usuario',50);
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
        Schema::dropIfExists('ordenmtlasignar');
    }
}
