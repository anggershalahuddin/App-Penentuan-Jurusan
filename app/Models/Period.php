<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Period extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'period';

    protected $fillable = [
        'tahun',
        'keterangan',
    ];

    // public function kelas()
    // {
    //     return $this->hasMany(Kelas::class);
    // }

    public function siswa()
    {
        return $this->hasMany(Student::class);
    }
}
