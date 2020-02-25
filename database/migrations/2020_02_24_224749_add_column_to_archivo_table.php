<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('archivo', function (Blueprint $table) {
            $table->integer('periodo')->after('registros');
            $table->string('zona',45)->after('estado');
            $table->integer('cantidad')->after('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('archivo', function (Blueprint $table) {
            //
        });
    }
}
