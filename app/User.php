<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role->name === 'Administrateur';
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->withPivot('created_at', 'updated_at');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }
}
