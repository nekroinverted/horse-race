<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    // allows mass assignment
    protected $fillable = ['first_name', 'last_name', 'time'];
}
