<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'tagline',
        'deskripsi',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email',
        'logo',
    ];
}
