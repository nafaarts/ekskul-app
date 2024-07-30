<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KegiatanEkstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_ekstrakurikuler';

    protected $fillable = [
        'ekstrakurikuler_id',
        'gambar',
        'deskripsi'
    ];

    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekstrakurikuler_id');
    }
}
