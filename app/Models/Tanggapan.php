<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'tgl_tanggapan',
        'tgl_pengaduan',
        'tanggapan',
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
