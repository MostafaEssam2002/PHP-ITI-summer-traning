<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','image'];

    // علاقة one-to-many مع الطلاب
    public function students() {
        return $this->hasMany(Student::class);
    }

    // علاقة one-to-many مع الكورسات
    public function courses() {
        return $this->hasMany(Course::class);
    }
}
