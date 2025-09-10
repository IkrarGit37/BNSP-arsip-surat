<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public $timestamps = false; // 

    // Relasi ke Surat
    public function surats()
    {
        return $this->hasMany(Surat::class, 'kategori_id');
    }
}
