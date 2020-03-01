<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesmtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenesmtl', function (Blueprint $table) {
            $table->unsignedBigIncrements('id');
            $table->unsignedBigInteger('ordenesmtl_id');
            $table->foreign('ordenesmtl_id', 'fk_ordenesmtl_entrada')->references('id')->on('entrada')->onDelete('restrict')->onUpdate('restrict');
            $table->string('zona',45);
            $table->integer('poliza')->unique();
            $table->string('direccion',255);
            $table->string('recorrido',255);
            $table->string('medidor',50);
            $table->string('nombre',255);
            $table->integer('year');
            $table->integer('mes');
            $table->integer('lote');
            $table->integer('periodo');
            $table->integer('consecutivo');
            $table->integer('consecutivo_int');
            $table->integer('ruta')->nullable();
            $table->integer('tope');
            $table->string('usuario',50)->nullable();
            $table->dateTime('fecha_de_ejecucion')->nullable();
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
            $table->string('foto1',255)->nullable();
            $table->string('foto2',255)->nullable();
            $table->string('foto3',255)->nullable();
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
        Schema::dropIfExists('ordenesmtl');
    }
}
