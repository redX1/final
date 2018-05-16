<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class QuizController extends Controller
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
        $request->validate(
            [
                "q_texte" => 'required',
                "r_texte1" => 'required',
                "r_texte2" => "required"
            ]);


        $question=Question::firstOrCreate([
            'texte'=>$request->get('q_texte')
        ]);

        $reponse1=Reponse::firstOrCreate([
            'texte'=>$request->get('r_texte1')
        ]);
        $reponse2=Reponse::firstOrCreate([
            'texte'=>$request->get('r_texte2')
        ]);


        if($request->get('r_texte3') != null){
            $reponse3=Reponse::firstOrCreate([
                'texte'=>$request->get('r_texte3')
            ]);
           $question->reponses()->sync([
               $reponse1->id =>['correct'=>1],
               $reponse2->id =>['correct'=>0],
               $reponse3->id=>['correct'=>0]
           ]);
        }
        else
        {
            $question->reponses()->sync([
                $reponse1->id =>['correct'=>1],
                $reponse2->id =>['correct'=>0]

            ]);
        }

        $emissions =Emission::all();
        $questions=Question::all();
        $reponses=Reponse::all();

        return view('home',compact('questions','reponses','emissions'));
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
