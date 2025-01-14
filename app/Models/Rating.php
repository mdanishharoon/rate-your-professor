<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'professor_id',
        'fun_rating',
        'teaching_rating',
        'overall_rating',
        'comment',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
