<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'judul',
        'kategori_id',
        'file',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function getDownloadName()
    {
        $kategoriSlug = Str::slug($this->kategori->nama_kategori, '-');
        $nomorSurat = str_replace('/', '-', $this->nomor_surat);

        return $kategoriSlug . '_' . $nomorSurat . '.pdf';
    }
}
