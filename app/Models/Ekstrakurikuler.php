<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';

    protected $fillable = [
        'user_id',
        'nama',
        'slug',
        'deskripsi',
        'gambar'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(KegiatanEkstrakurikuler::class, 'ekstrakurikuler_id');
    }

    public function pendaftar(): HasMany
    {
        return $this->hasMany(Pendaftar::class);
    }
}
