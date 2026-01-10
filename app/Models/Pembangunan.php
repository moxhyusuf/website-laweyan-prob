<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
    use HasFactory;

    protected $table = 'pembangunans';

    protected $fillable = [
        'judul',
        'keterangan',
        // ❌ HAPUS 'foto'
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'parent');
    }
}
