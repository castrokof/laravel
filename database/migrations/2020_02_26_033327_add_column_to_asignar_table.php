<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToAsignarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignar', function (Blueprint $table) {
            
            $table->unsignedBigInteger('ordensmtl_id')->after('id');
            $table->foreign('ordensmtl_id', 'fk_asignar_ordensmtl')->references('id')->on('ordenesmtl')->onDelete('restrict')->onUpdate('restrict');

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
