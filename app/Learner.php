<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    //
    protected $fillable = [
        'name', 'rank'
    ];
}
