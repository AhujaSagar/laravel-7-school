<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses_offered extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'course_id',
        'school_id' 
    ];
}
