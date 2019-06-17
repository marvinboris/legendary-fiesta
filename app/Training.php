<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //
    protected $fillable = [
        'name', 'category_id', 'cost', 'duration', 'theory', 'practice'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
