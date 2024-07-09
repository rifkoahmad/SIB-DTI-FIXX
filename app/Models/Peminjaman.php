<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model


{


    use HasFactory;

    protected $table = 'peminjamen';

    protected $fillable = ['users_id', 'barangs_id', 'pegawais_id', 'jumlah', 'tanggal_pinjam', 'lama_pinjam'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barangs_id', 'id');
    }
    public function pegawais(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawais_id', 'id');
    }
}
