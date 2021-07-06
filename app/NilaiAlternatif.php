<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table        = 'nilai_alternatif';
//    protected $fillable     = ['nama_crip','nilai_crip'];
    protected $hidden       = ['created_at','updated_at'];
    public function crip() {
        return $this->belongsTo(\App\Crip::class,'crip_id');
    }
    public function alternatif() {
        return $this->belongsTo(\App\Alternatif::class,'alternatif_id');
    }
}
