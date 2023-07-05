<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBobotToKriteriaTable extends Migration
{
    public function up()
    {
        Schema::table('kriteria', function (Blueprint $table) {
            $table->decimal('bobot', 5, 2)->after('nama'); // Tambahkan kolom bobot setelah kolom nama
        });
    }

    public function down()
    {
        Schema::table('kriteria', function (Blueprint $table) {
            $table->dropColumn('bobot'); // Hapus kolom bobot jika rollback migration
        });
    }
}
