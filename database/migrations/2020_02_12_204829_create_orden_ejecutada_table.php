<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenEjecutadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_ejecutada', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->unsignedBigInteger('ordenejecutada_id');
            $table->foreign('ordenejecutada_id', 'fk_ordenejecutada_ordenesmtl')->references('id')->on('ordenesmtl')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('poliza');
            $table->string('usuario',50);
            $table->dateTime('fecha_de_ejecucion');
            $table->string('new_medidor',50)->nullable();
            $table->integer('lectura')->nullable();
            $table->string('oposicion',50)->nullable();
            $table->string('sin_caja',50)->nullable();
            $table->string('sin_tapa',50)->nullable();
            $table->string('fuga_antes',50)->nullable();
            $table->string('fuga_despues',50)->nullable();
            $table->string('talco_roto',50)->nullable();
            $table->string('posible_fraude',50)->nullable();
            $table->string('mtl',50)->nullable();
            $table->string('coordenada',255)->nullable();
            $table->string('latitud',255)->nullable();
            $table->string('longitud',255)->nullable();
            $table->string('estado',50);
            $table->integer('estado_id');
            $table->string('foto1',255);
            $table->string('foto2',255);
            $table->string('foto3',255);
            $table->string('foto4',255)->nullable();
            $table->string('foto5',255)->nullable();
            $table->string('foto6',255)->nullable();
            $table->string('foto7',255)->nullable();
            $table->string('foto8',255)->nullable();
            $table->string('futuro',255)->nullable();
            $table->string('futuro1',255)->nullable();
            $table->string('futuro2',255)->nullable();
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
        Schema::dropIfExists('orden_ejecutada');
    }
}
