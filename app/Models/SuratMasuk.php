<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $fillable = [
        'no_surat',
        'tgl_surat',
        'pengirim',
        'perihal',
        'jenis_surat',
        'sifat_surat',
        'file_digital',
        'created_by',
    ];
}
