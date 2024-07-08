<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_beritas_id', 'judul', 'catatan', 'gambar', 'tanggal_publikasi'];


    public function kategori_beritas(): BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class);
    }
}
