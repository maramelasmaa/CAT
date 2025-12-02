<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id', 'amount', 'paid_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
