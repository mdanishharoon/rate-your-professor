<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function reviews()
    {
        return $this->hasMany(Rating::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function averageRatings()
    {
        return [
            'fun' => $this->reviews()->avg('fun_rating'),
            'teaching' => $this->reviews()->avg('teaching_rating'),
            'overall' => $this->reviews()->avg('overall_rating'),
        ];
    }
}