<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['ruangans_id', 'nama_barang', 'kode_barang', 'stok', 'foto','status'];

    public function ruangans(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }
}

