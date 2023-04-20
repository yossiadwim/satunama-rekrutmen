<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarLowongan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pelamar_lowongan';

    public function dokumenPelamarLowongan(){
        return $this->hasMany(DokumenPelamarLowongan::class);
    }

    public function pelamar(){
        return $this->belongsTo(Pelamar::class);
    }

}
