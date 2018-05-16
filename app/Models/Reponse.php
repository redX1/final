<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['texte','picture'];

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question')->withPivot('correct')->withTimestamps();
    }
}
