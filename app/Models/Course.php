<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'schedule',
        'capacity',
        'available_seats',
        'image',
        'center_id',
        'tutor_id',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
