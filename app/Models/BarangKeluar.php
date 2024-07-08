<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = ['users_id','tanggal_keluar'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function peminjamen(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'users_id', 'id');
    }
}
