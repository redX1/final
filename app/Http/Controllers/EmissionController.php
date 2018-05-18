<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use App\Models\Emission_Diffusion;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class EmissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'name'=>'required',
            'numero'=>'required'
        ]);

        $a= Emission::firstOrCreate([
            'name'=>$request->get('name'),
            'numero'=>$request->get('numero')
        ]);
        if($request->get('lundi') != null && $request->get('lundiB') != null && $request->get('lundiE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('lundi'),
                'begin_at'=>$request->get('lundiB'),
                'end_at'=>$request->get('lundiE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('mardi') != null && $request->get('mardiB') != null && $request->get('mardiE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('mardi'),
                'begin_at'=>$request->get('mardiB'),
                'end_at'=>$request->get('mardiE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('mercredi') != null && $request->get('mercrediB') != null && $request->get('mercrediE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('mercredi'),
                'begin_at'=>$request->get('mercrediB'),
                'end_at'=>$request->get('mercrediE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('jeudi') != null && $request->get('jeudiB') != null && $request->get('jeudiE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('jeudi'),
                'begin_at'=>$request->get('jeudiB'),
                'end_at'=>$request->get('jeudiE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('vendredi') != null && $request->get('vendrediB') != null && $request->get('vendrediE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('vendredi'),
                'begin_at'=>$request->get('vendrediB'),
                'end_at'=>$request->get('vendrediE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('samedi') != null && $request->get('samediB') != null && $request->get('samediE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('samedi'),
                'begin_at'=>$request->get('samediB'),
                'end_at'=>$request->get('samediE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };
        if($request->get('dimanche') != null && $request->get('dimancheB') != null && $request->get('dimancheE') != null)
        {
            $diffusion = new Emission_Diffusion([
                'day'=>$request->get('dimanche'),
                'begin_at'=>$request->get('dimancheB'),
                'end_at'=>$request->get('dimancheE')

            ]);
            $a->emission_diffusions()->save($diffusion);
        };

        $emissions =Emission::all();
        $questions=Question::all();
        $reponses=Reponse::all();
        $participants = Participant::all();
        return view('home',compact('questions','reponses','emissions','participants'));
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
