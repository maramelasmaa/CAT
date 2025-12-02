<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'duration',
        'tutor_id', 'center_id'
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
