<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'kode_centroid'
    ];

    // Relasi ke model Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relasi ke model Centroid
    public function centroid()
    {
        return $this->belongsTo(Centroid::class, 'kode_centroid', 'kode_centroid');
    }

    public function closestCentroid()
    {
        $centroids = [
            'C1' => $this->distance_to_c1,
            'C2' => $this->distance_to_c2,
            'C3' => $this->distance_to_c3,
            'C4' => $this->distance_to_c4,
            'C5' => $this->distance_to_c5,
            'C6' => $this->distance_to_c6,
            'C7' => $this->distance_to_c7,
            'C8' => $this->distance_to_c8,
        ];

        asort($centroids);
        return [
            'centroid' => key($centroids),
            'distance' => reset($centroids),
        ];
    }
}
