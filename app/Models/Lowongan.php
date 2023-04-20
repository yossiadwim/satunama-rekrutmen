<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lowongan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    public $table = 'lowongan';

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_lowongan'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
