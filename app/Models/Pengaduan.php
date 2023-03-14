<?php

namespace App\Models;

use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'isilaporan',
        'status',
        'tgl_pengaduan',
        'foto',
        'nik',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function tanggapan(){
        return $this->hasMany(Tanggapan::class);
    }
    
}
