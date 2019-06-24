<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        'name', 'path', 'category_id'
    ];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
