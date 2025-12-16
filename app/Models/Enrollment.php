<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'payment_type',
        'reservation_expiry',
        'payment_proof',
    ];
    protected $casts = [
        'reservation_expiry' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // student
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
