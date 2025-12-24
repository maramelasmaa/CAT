<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'bank_account',
        'image',
        'description',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (preg_match('#^https?://#i', $this->image)) {
            return $this->image;
        }

        $value = ltrim($this->image, '/');
        $value = str_replace('\\', '/', $value);

        if (str_starts_with($value, 'storage/')) {
            return asset($value);
        }

        return asset('storage/' . $value);
    }

    public function managers()
    {
        return $this->hasMany(CenterManager::class);
    }

    public function tutors()
    {
        return $this->hasMany(Tutor::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
