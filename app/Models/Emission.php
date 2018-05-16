<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    protected $fillable =['name','numero'];

    public static function CountEmission()
    {
        return Emission::all()->count();
    }

    public function emission_diffusions()
    {
        return $this->hasMany('App\Models\Emission_Diffusion');
    }

}
