<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','duration','track_id'];

    // كل كورس ينتمي لتراك
    public function track() {
        return $this->belongsTo(Track::class);
    }
    public function tracks() {
        return $this->belongsTo(Track::class);
    }

    // علاقة many-to-many مع الطلاب
    public function students() {
        return $this->belongsToMany(Student::class, 'course_student');
    }

}
