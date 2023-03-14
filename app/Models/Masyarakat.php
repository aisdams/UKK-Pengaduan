<?php
namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'notlp',
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
