<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Training extends Model
{
    //
    protected $fillable = [
        'name', 'category_id', 'cost', 'duration', 'theory', 'practice'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public static function progress($id)
    {
        $user = Auth::user();
        $training = $user->trainings()->where('trainings.id', $id)->get()->first();
        $start = strtotime($training->pivot->created_at);
        return round((time() - $start) * 100 / ($training->duration * 86400));
    }

    public static function remaining($id)
    {
        $user = Auth::user();
        $training = $user->trainings()->where('trainings.id', $id)->get()->first();
        $start = strtotime($training->pivot->created_at);
        return $training->duration - round((time() - $start) / 86400);
    }
}
