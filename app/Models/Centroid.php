<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Centroid extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'centroids';

    protected $primaryKey = 'centroid_id'; //menentukan kolom yang id yang diinisialisasi dengan "centroid_id" sebagai $primaryKey
    protected $fillable = [
        'kode_centroid',
        'nama_cluster',
        'rumpun',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}