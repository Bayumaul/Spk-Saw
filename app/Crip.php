<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crip extends Model
{
    protected $table        = 'crip';
    protected $fillable     = ['nama_crip','nilai_crip'];
    protected $hidden       = ['created_at','updated_at'];
    public function kriteria() {
        return $this->belongsTo(\App\Kriteria::class,'kriteria_id');
    }
    public function nilai() {
        return $this->belongsTo(\App\NilaiAlternatif::class);
    }
}