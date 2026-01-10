<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangPemuda extends Model
{
    protected $table = 'ruang_pemuda';

    protected $fillable = [
        'nama',
        'keterangan',
        'img',
    ];
}
