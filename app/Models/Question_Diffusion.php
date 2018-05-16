<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question_Diffusion extends Model
{
   protected $fillable = ['emission_diffusion_id','question_id','begin_at','end_at','day'];
}
