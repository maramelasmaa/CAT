<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'phone', 'status', 'center_id'];

    protected $hidden = ['password'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot(['status', 'payment_type', 'reservation_expiry'])
            ->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Enrollment::class, 'student_id', 'enrollment_id', 'id', 'id');
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
