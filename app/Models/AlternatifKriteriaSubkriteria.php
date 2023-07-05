<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternatifKriteriaSubkriteria extends Model
{
    protected $table = 'alternatif_kriteria_subkriteria';
    protected $fillable = [
        'alternatif_id',
        'kriteria_id',
        'sub_kriteria_id',
    ];

    // Relasi dengan model Alternatif
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    // Relasi dengan model Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    // Relasi dengan model SubKriteria
    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
