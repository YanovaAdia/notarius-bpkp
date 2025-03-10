<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $fillable = ['tanggal', 'nama_aktivitas', 'instruksi_aktivitas', 'detail_aktivitas', 'issue', 'solusi', 'status', 'nip', 'id_tim'];
}
