<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = ['peminjamen_id', 'pegawais_id', 'tanggal_kembali'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function pegawais(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawais_id', 'id');
    }

    public function peminjamen(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'peminjamen_id', 'id');
    }
}
