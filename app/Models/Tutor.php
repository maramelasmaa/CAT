<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'specialization', 'center_id'];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
