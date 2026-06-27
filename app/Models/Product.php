<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'fitur',
    ];

    protected $casts = [
        'fitur' => 'array',
    ];
}
