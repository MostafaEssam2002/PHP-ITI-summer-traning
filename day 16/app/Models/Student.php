<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','address','gender','age','image','track_id'];

    // كل طالب بينتمي لتراك
    public function track() {
        return $this->belongsTo(Track::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
                    ->withPivot('grade') // ✅ لجلب العمود grade من pivot
                    ->withTimestamps();
    }

}
