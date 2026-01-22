<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'no_surat',
        'tgl_surat',
        'tujuan',
        'perihal',
        'jenis_surat',
        'sifat_surat',
        'file_digital',
        'created_by',
    ];
}
