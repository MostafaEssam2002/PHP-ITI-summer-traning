<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //table (plural )====>mystudents
    // protected $table='myStudents';
    // primaryKey ==> id  ==> myId
    // protected $primaryKey="myID";

    protected $fillable=['name','email','gender','image','address','age']; // permited data
    // protected $guarded=['token']; // forbidden
    // protected $timestamps=false;
    public $timestamps = false;
    // created_at
    // updated_at
}
