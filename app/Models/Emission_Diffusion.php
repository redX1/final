<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emission_Diffusion extends Model
{

    protected $fillable = ['day','emission_id','begin_at','end_at'];

    public static function JourDiffusion($emission_id)
    {
        $emission =Emission::find($emission_id);
        $jour ="";
        $separation = "/";
        $i = 0;

        foreach ($emission->emission_diffusions as $emisDiff)
        {
            if($i==0)
            {
                $jour =$jour."".$emisDiff->day;
            }
            elseif($i>0)
            {
                  $jour = $jour."/".$emisDiff->day;
            }
            $i = $i+1;
        }
       return $jour;
    }
}
