<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wecashup extends Model
{
    //
    protected $fillable = [
        'merchant_secret', 'transaction_token', 'transaction_uid', 'transaction_confirmation_code', 'transaction_provider_name', 'training_id', 'status' 
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function training() {
        return $this->belongsTo('App\Training');
    }
}
