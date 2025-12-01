<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'schedule',
        'capacity',
        'available_seats',
        'center_id',
        'tutor_id',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')
            ->withPivot(['status', 'payment_type', 'reservation_expiry'])
            ->withTimestamps();
    }
}
