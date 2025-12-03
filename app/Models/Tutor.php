<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'specialization',
        'image',
        'center_id',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
