<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['barangs_id', 'suppliers_id', 'jumlah_barang', 'tanggal_masuk'];

    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
