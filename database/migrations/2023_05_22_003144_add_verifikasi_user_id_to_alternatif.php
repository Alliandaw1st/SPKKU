<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifikasiUserIdToAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternatif', function (Blueprint $table) {
            $table->unsignedBigInteger('verifikasi_user_id')->nullable();
            $table->foreign('verifikasi_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alternatif', function (Blueprint $table) {
            $table->dropForeign(['verifikasi_user_id']);
            $table->dropColumn('verifikasi_user_id');
        });
    }
}
