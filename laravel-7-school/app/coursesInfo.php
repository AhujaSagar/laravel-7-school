<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursesInfo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'duration',
        'professor',
        'fees'
    ];
}
