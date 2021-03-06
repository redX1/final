<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Reponse;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $emissions = Emission::all();
        $questions = Question::all();
        $reponses = Reponse::all();
        $participants = Participant::Joueur();
        return view('home',compact('questions','reponses','emissions','participants'));
    }
}
