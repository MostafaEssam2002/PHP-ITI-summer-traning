<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'gender', 'track_id'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
