<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToOrdenesmtlCambiarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenesmtl', function (Blueprint $table) {
            $table->string('lectura',11)->nullable()->change();
            $table->string('nombreu',100)->nullable()->after('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenesmtl', function (Blueprint $table) {
            //
        });
    }
}
