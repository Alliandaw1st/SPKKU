<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    protected $fillable = [
        'nama',
        'kriteria_id',
        'nilai',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    // Relasi dengan model AlternatifKriteriaSubkriteria
    public function alternatifKriteriaSubkriteria()
    {
        return $this->hasMany(AlternatifKriteriaSubkriteria::class, 'sub_kriteria_id');
    }

    // Aturan validasi (jika diperlukan)
    public static $rules = [
        'nama' => 'required',
        'nilai' => 'required|numeric|min:1',
    ];
}