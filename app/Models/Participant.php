<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable =['sender','receiver','texte'];
    public static function CountParticipant()
    {
        return Participant::all()->count();
    }
    public static function CountParticipationEmission($emissionNumber){
        return Participant::where('receiver'
            ,'=',$emissionNumber)->count();
    }

    /**
     * @param $emissionNumber
     * @param $questDiff
     * @return mixed
     */
    public static function CountParticipantQuiz($emissionNumber, $questDiff)
    {
        $begin = $questDiff->day.' '.$questDiff->begin_at;
        $end =$questDiff->day.' '.$questDiff->end_at;
        $dayBegin=Carbon::parse($begin);
        $dayEnd = Carbon::parse($end);

        return Participant::where('receiver','=',$emissionNumber)
                            ->whereBetween('created_at',[$dayBegin,$dayEnd])
                            ->count();

    }
    public static function CountGagnantQuiz($emissionNumber, $questDiff,$question)
    {
        $resultat="";
        foreach ($question->reponses as $reponse)
        {
            if($reponse->pivot->correct == 1)
            {
             $resultat = $reponse->texte;
            }
        }

        $begin = $questDiff->day.' '.$questDiff->begin_at;
        $end =$questDiff->day.' '.$questDiff->end_at;
        $dayBegin=Carbon::parse($begin);
        $dayEnd = Carbon::parse($end);

        return Participant::where('receiver','=',$emissionNumber)
                            ->whereBetween('created_at',[$dayBegin,$dayEnd])
                            ->where(strtoupper('texte'),'like',strtoupper($resultat))
                            ->count();

    }
}
