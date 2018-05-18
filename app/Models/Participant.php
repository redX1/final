<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function ParticipantQuiz($emissionNumber,$questDiff)
    {
        $begin = $questDiff->day.' '.$questDiff->begin_at;
        $end =$questDiff->day.' '.$questDiff->end_at;
        $dayBegin=Carbon::parse($begin);
        $dayEnd = Carbon::parse($end);

        return Participant::where('receiver','=',$emissionNumber)
            ->whereBetween('created_at',[$dayBegin,$dayEnd])
            ->value('sender','texte','created_at');
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

    public static function MaxParticipantPerEmission($emissionnumber)
    {
   
    $maximum=  DB::select( "select max(sender) as maximum, date(datePlay) as dateMax from 
                                    ( select count(sender) as sender,date(created_at) as datePlay 
                                      from participants 
                                      where date(created_at) in (select distinct(day) from question__diffusions)
                                      and receiver = $emissionnumber group by date(created_at)
                                    )  as soustable  group by date(datePlay) ");

//      dd($maximum);
       foreach ($maximum as $max)
        {
            return $max->maximum;
        }
    }
    public static function MaxDateParticipantPerEmission($emissionnumber)
    {
        $maximum=  DB::select( "select max(sender) as maximum, date(datePlay) as dateMax from 
                                    ( select count(sender) as sender,date(created_at) as datePlay 
                                      from participants 
                                      where date(created_at) in (select distinct(day) from question__diffusions)
                                      and receiver = $emissionnumber group by date(created_at)
                                    )  as soustable  group by date(datePlay) ");

        foreach ($maximum as $max)
        {
            return $max->dateMax;
        }
    }
    public static function MinParticipantPerEmission($emissionnumber)
    {
        $minimum=  DB::select( "select min(sender) as minimum, date(datePlay) as datemin from 
                                    ( select count(sender) as sender,date(created_at) as datePlay 
                                      from participants 
                                      where date(created_at) in (select distinct(day) from question__diffusions)
                                      and receiver = $emissionnumber group by date(created_at)
                                    )  as soustable  group by date(datePlay) ");
//        dd($minimum);
       foreach ($minimum as $Min)
        {
            return $Min->minimum;
        }
    }
    public static function MinDateParticipantPerEmission($emissionnumber)
    {
        $minimum=  DB::select( "select min(sender) as minimum, date(datePlay) as datemin from 
                                    ( select count(sender) as sender,date(created_at) as datePlay 
                                      from participants 
                                      where date(created_at) in (select distinct(day) from question__diffusions)
                                      and receiver = $emissionnumber group by date(created_at)
                                    )  as soustable  group by date(datePlay) ");
//        dd($minimum);
        foreach ($minimum as $Min)
        {
            return $Min->datemin;
        }
    }

    public static function Joueur(){
       return DB::select('select sender,texte,participants.created_at,receiver 
        from participants,emissions
        where participants.receiver = emissions.numero
        and date(participants.created_at) in (select distinct(day) from question__diffusions)');

    }
}
