<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use App\Models\Emission_Diffusion;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Question_Diffusion;
use App\Models\Reponse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionDiffusionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'emission'=>'required',
            'begin'=>'required',
            'end'=>'required',
            'question_id'=>'required'
        ]);
        $emission=Emission_Diffusion::where('id','=',$request->get('emission'))->first();
        $carbonBegin = Carbon::parse($request->get('begin'));
        $carbonEnd = Carbon::parse($request->get('end'));
        if( $emission->day === strtoupper($carbonBegin->format('l')) && $emission->day === strtoupper($carbonEnd->format('l')) && $carbonEnd->month ===$carbonBegin->month)
        {
           if(($emission->begin_at <=$carbonBegin->hour) && ($carbonBegin->hour < $carbonEnd->hour) && ($carbonEnd->hour <= $emission->end_at) );
            {
                $questionDiff = new Question_Diffusion([
                    'emission_diffusion_id'=>$request->get('emission'),
                    'day'=>$carbonBegin->toDateString(),
                    'begin_at'=>$request->get('begin'),
                    'end_at'=>$request->get('end')
                ]);
                $question = Question::where('id','=',$request->get('question_id'))->first();

                $question->question_diffusions()->save($questionDiff);

                $emissions =Emission::all();
                $questions=Question::all();
                $reponses=Reponse::all();
                $participants = Participant::all();
                return view('home',compact('questions','reponses','emissions','participants'));
            }

        }
        dd("Ce ne sont pas les memes jours");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
