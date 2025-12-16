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
    

   public function center()
{
    return $this->belongsTo(\App\Models\Center::class);
}

public function tutor()
{
    return $this->belongsTo(\App\Models\Tutor::class);
}

public function enrollments()
{
    return $this->hasMany(\App\Models\Enrollment::class);
}

}
