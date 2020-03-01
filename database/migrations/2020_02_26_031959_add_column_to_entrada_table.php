<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignar', function (Blueprint $table) {
            $table->unsignedBigInteger('ordenesmtl_id')->after('id');
            $table->foreign('ordenesmtl_id', 'fk_asignar_ordenesmtl')->references('id')->on('ordenesmtl')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignar', function (Blueprint $table) {
            //
        });
    }
}
