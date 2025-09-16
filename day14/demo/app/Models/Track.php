<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['name', 'description', 'image'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
