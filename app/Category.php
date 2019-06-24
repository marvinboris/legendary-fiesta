<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'condition'
    ];

    public function trainings() {
        return $this->hasMany('App\Training');
    }

    public function documents() {
        return $this->belongsToMany('App\Document');
    }
}
