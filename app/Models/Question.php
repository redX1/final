<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['texte','picture'];

    public static function CountQuiz()
    {
        return Question::all()->count();
    }

    public function reponses()
    {
        return $this->belongsToMany('App\Models\Reponse')->withPivot('correct')->withTimestamps();
    }

    public function question_diffusions()
    {
        return $this->hasMany('App\Models\Question_Diffusion');
    }
}
