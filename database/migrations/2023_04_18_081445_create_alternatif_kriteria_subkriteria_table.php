<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteriaSubkriteriaTable extends Migration
{
    public function up()
    {
        Schema::create('alternatif_kriteria_subkriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->timestamps();

            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatif_kriteria_subkriteria');
    }
}
