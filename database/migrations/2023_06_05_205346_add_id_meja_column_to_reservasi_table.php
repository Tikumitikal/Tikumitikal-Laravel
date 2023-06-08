<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdMejaColumnToReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_reservasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_meja')->after('id_user');
            $table->foreign('id_meja')->references('id')->on('tb_meja')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_reservasi', function (Blueprint $table) {
            $table->dropForeign(['id_meja']);
            $table->dropColumn('id_meja');
        });
    }
}
