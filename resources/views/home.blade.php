@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified " style="background-color:#64b5f6!important;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#panel1" role="tab"><i class="fa fa-star"></i>Resultat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel2" role="tab"><i class="fa fa-tv"></i> Emission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#panel3" role="tab"><i class="fa fa-question"></i> Quiz</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="card">
                    <div class="card-body" >

                        <div class="tab-content">
                            <!--Panel 1-->
                            <div class="tab-pane fade " id="panel1" role="tabpanel">
                                <br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                            </div>
                            <!--/.Panel 1-->
                            <!--Panel 2-->
                            <div class="tab-pane fade  in show active" id="panel2" role="tabpanel">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                    <span><i class="fa fa-tv" style="color: white;"></i> </span> Ajouter une emission
                                </button>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <!--Accordion wrapper-->
                                            <div id="accordion">
                                                @foreach($emissions as $emission)
                                                    <div class="card " style="background-color:#64b5f6!important;">
                                                        <div class="card-header" id="heading{{$emission->id}}">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$emission->id}}" aria-expanded="true" aria-controls="collapse{{$emission->id}}">
                                                                    <span>{{$emission->name}}</span> <i style="text-indent: 30px;" class="fa fa-phone"></i>  {{$emission->numero}}
                                                                </button>
                                                            </h5>
                                                        </div>

                                                        <div id="collapse{{$emission->id}}" class="collapse" aria-labelledby="heading{{$emission->id}}" data-parent="#accordion">
                                                            <div class="card-body" style="background-image: url('/img/back3.jpg');">
                                                                @foreach($emission->emission_diffusions as $emisDiff)
                                                                    <div id="accordion1">
                                                                        <div class="card">
                                                                            <div class="card-header" id="heading{{$emission->id.''.$emisDiff->id}}">
                                                                                <h5 class="mb-0">
                                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$emission->id.''.$emisDiff->id}}" aria-expanded="true" aria-controls="collapse{{$emission->id.''.$emisDiff->id}}">
                                                                                        <i class="fa fa-calendar-plus-o"></i> {{$emisDiff->day}}  <i style="text-indent: 20px;" class="fa fa-clock-o"></i>{{$emisDiff->begin_at.' - '.$emisDiff->end_at}}
                                                                                    </button>
                                                                                </h5>
                                                                            </div>

                                                                            <div id="collapse{{$emission->id.''.$emisDiff->id}}" class="collapse" aria-labelledby="heading{{$emission->id.''.$emisDiff->id}}" data-parent="#accordion1">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        @foreach($questions as $question)
                                                                                            @foreach($question->question_diffusions as $questDiff)

                                                                                                @if($questDiff->emission_diffusion_id == $emisDiff->id && $questDiff->question_id ==$question->id)
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="card card-widget widget-user">
                                                                                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                                                            <div class="widget-user-header text-white"
                                                                                                                 style="background: url('img/photo3.jpg') center center;">
                                                                                                                {{--<div class="btn-group" style="margin-left: 87%;">--}}
                                                                                                                {{--<button type="button" class="btn btn-tool" data-toggle="dropdown" style="border-radius: 200px; background-color: deeppink" >--}}
                                                                                                                {{--<i class="fa fa-<!-- Insertion de la fenetre modale pour assigner les emissiono -->"></i>--}}
                                                                                                                {{--</button>--}}
                                                                                                                {{--<div class="dropdown-menu dropdown-menu-right" role="menu">--}}
                                                                                                                {{--<a href="pages/examples/creerQuizz.html" class="dropdown-item">Assigner à une émission</a>--}}
                                                                                                                {{--<a href="pages/mailbox/ListeParticipants.html" class="dropdown-item">Ajouter un quizz</a>--}}
                                                                                                                {{--<a href="pages/examples/creerEmission.html" class="dropdown-item">Modifie quizz</a>--}}
                                                                                                                {{--<a href="pages/examples/creerEmission.html" class="dropdown-item">Liste des participants</a>--}}
                                                                                                                {{--<a class="dropdown-divider"></a>--}}
                                                                                                                {{--<a href="pages/mailbox/ListeUtilisateurs.html" class="dropdown-item">Liste des utilisateurs</a>--}}
                                                                                                                {{--</div>--}}
                                                                                                                {{--</div>--}}
                                                                                                                <h5 class="widget-user-desc">{{$questDiff->day}}</h5>
                                                                                                                <h5 class="widget-user-username">{{$question->texte}}</h5>

                                                                                                            </div>
                                                                                                            <div class="widget-user-image">
                                                                                                                <img class="img-circle" src="img/user3-128x128.jpg" alt="User Avatar" style="border-radius:100%">
                                                                                                            </div>
                                                                                                            <div class="card-footer">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4 border-right">
                                                                                                                        <div class="description-block">
                                                                                                                                <a  type="button" class="description-header" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                                                                                                                                    {{\App\Models\Participant::CountParticipantQuiz($emission->numero,$questDiff)}}
                                                                                                                                </a>
                                                                                                                                <div class="dropdown-menu">
                                                                                                                                    <table class="table table-striped">
                                                                                                                                        <thead style="background-color:#483D8B">
                                                                                                                                        <tr class="text-center">
                                                                                                                                            <th style="color: white;"> <i class="fa fa-phone"></i></th>
                                                                                                                                            <th style="color: white;"><i class="fa fa-question-circle"></i></th>
                                                                                                                                            <th style="color: white;"> <i class="fa fa-calendar"></i></th>
                                                                                                                                        </tr>
                                                                                                                                        </thead>
                                                                                                                                        <tbody>
                                                                                                                                        @foreach($participants as $participant)
                                                                                                                                            @if(($participant->receiver == $emission->numero) && (\Carbon\Carbon::parse($questDiff->day.' '.$questDiff->begin_at)->lessThanOrEqualTo(Carbon\Carbon::parse($participant->created_at))) && (\Carbon\Carbon::parse($questDiff->day.' '.$questDiff->end_at)->greaterThanOrEqualTo(Carbon\Carbon::parse($participant->created_at))) )
                                                                                                                                                @foreach($question->reponses as $reponse )
                                                                                                                                                    @if(strtoupper($reponse->texte)== strtoupper($participant->texte))
                                                                                                                                                    <tr class="{{$reponse->pivot->correct ==1 ? 'table-info' : 'table-active'}}">
                                                                                                                                                        <td>{{$participant->sender}}</td>
                                                                                                                                                        <td>{{$participant->texte}}</td>
                                                                                                                                                        <td>{{$participant->created_at}}</td>
                                                                                                                                                    </tr>
                                                                                                                                                    @endif
                                                                                                                                                    @endforeach

                                                                                                                                            @endif
                                                                                                                                        @endforeach

                                                                                                                                        </tbody>
                                                                                                                                    </table>
                                                                                                                                </div>
                                                                                                                                <span class="description-text">JOUEURS</span>
                                                                                                                        </div>

                                                                                                                        <!-- /.description-block -->
                                                                                                                    </div>
                                                                                                                    <!-- /.col -->
                                                                                                                    <div class="col-sm-4 border-right">
                                                                                                                        <div class="description-block">
                                                                                                                           <a  type="button" class="description-header" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                                                                                                                                {{\App\Models\Participant::CountGagnantQuiz($emission->numero,$questDiff,$question)}}
                                                                                                                           </a>
                                                                                                                            <div class="dropdown-menu">
                                                                                                                                <table class="table table-striped">
                                                                                                                                    <thead style="background-color:#483D8B">
                                                                                                                                    <tr class="text-center">
                                                                                                                                        <th style="color: white;"> <i class="fa fa-phone"></i></th>
                                                                                                                                        <th style="color: white;"><i class="fa fa-question-circle"></i></th>
                                                                                                                                        <th style="color: white;"> <i class="fa fa-calendar"></i></th>
                                                                                                                                    </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody>
                                                                                                                                    @foreach($participants as $participant)
                                                                                                                                        @if(($participant->receiver == $emission->numero) && (\Carbon\Carbon::parse($questDiff->day.' '.$questDiff->begin_at)->lessThanOrEqualTo(Carbon\Carbon::parse($participant->created_at))) && (\Carbon\Carbon::parse($questDiff->day.' '.$questDiff->end_at)->greaterThanOrEqualTo(Carbon\Carbon::parse($participant->created_at))) )
                                                                                                                                            @foreach($question->reponses as $reponse )
                                                                                                                                                @if($reponse->pivot->correct ==1 && strtoupper($reponse->texte)== strtoupper($participant->texte))
                                                                                                                                                    <tr class="table-info">
                                                                                                                                                        <td>{{$participant->sender}}</td>
                                                                                                                                                        <td>{{$participant->texte}}</td>
                                                                                                                                                        <td>{{$participant->created_at}}</td>
                                                                                                                                                    </tr>
                                                                                                                                                @endif
                                                                                                                                            @endforeach

                                                                                                                                        @endif
                                                                                                                                    @endforeach

                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                            <span class="description-text">WINNERS</span>
                                                                                                                        </div>
                                                                                                                        <!-- /.description-block -->
                                                                                                                    </div>
                                                                                                                    <!-- /.col -->
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <div class="description-block">
                                                                                                                            <span class="description-header">{{$questDiff->begin_at}}</span><br/>
                                                                                                                            <span class="description-header">{{$questDiff->end_at}}</span>
                                                                                                                        </div>
                                                                                                                        <!-- /.description-block -->
                                                                                                                    </div>
                                                                                                                    <!-- /.col -->
                                                                                                                </div>
                                                                                                                <!-- /.row -->
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach

                                                                                        @endforeach

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="card-footer" style="background-color: white">
                                                            <div class="row">
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        {{--<span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 47% </span>--}}
                                                                        <span class="description-text"> TOTAL DE PARTICIPANTS</span>
                                                                        <h5 class="description-header">{{\App\Models\Participant::CountParticipationEmission($emission->numero)}}</h5>

                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage text-warning">quiz du {{\App\Models\Participant::MaxDateParticipantPerEmission($emission->numero)}}</span>
                                                                        <h5 class="description-header">{{\App\Models\Participant::MaxParticipantPerEmission($emission->numero)}}</h5>
                                                                        <span class="description-text">QUIZ LE PLUS JOU&Eacute;</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                {{--<!-- /.col -->--}}
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block border-right">
                                                                        <span class="description-percentage text-success">quiz du {{\App\Models\Participant::MinDateParticipantPerEmission($emission->numero)}}</span>
                                                                        <h5 class="description-header">{{\App\Models\Participant::MinParticipantPerEmission($emission->numero)}}</h5>
                                                                        <span class="description-text">QUIZZ LE MOINS JOU&Eacute;</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="description-block">
                                                                        <span class="description-percentage text-danger"><i class="fa fa-calendar-plus-o"></i> DIFFUS&Eacute;E</span>
                                                                        <h5 class="description-header">LES:</h5>
                                                                        <span class="description-text">{{\App\Models\Emission_Diffusion::JourDiffusion($emission->id)}}</span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <!--/.Accordion wrapper-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/.Panel 2-->
                            <!--Panel 3-->
                            <div class="tab-pane fade " id="panel3" role="tabpanel">
                                {{--Boutton d'ajout des quiz--}}
                                <button type="button" style=" background-color: #64b5f6 !important;" class="btn btn-default" data-toggle="modal" data-target="#quizModal">
                                    Ajouter un quiz
                                </button>
                                {{--Fin du boutton--}}

                                {{--Debut de l'insertion des quiz--}}
                                <div class="container">
                                    <div class="row justify-content-center">

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <span class="card-text">Liste des quiz</span>
                                                </div>
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row">

                                                            @if(! $questions->isEmpty())

                                                                @foreach($questions as $question)

                                                                    {{--<div class="">Pas encore Diffusé</div>--}}
                                                                    {{--<div class="">Deja Diffusé</div>--}}
                                                                    @if($question->question_diffusions == null)
                                                                    {{dd($question)}}
                                                                    @endif
                                                                    <div class="col-md-4">
                                                                        <div class="card card-widget widget-user">
                                                                            <!-- Add the bg color to the header using any of the bg-* classes -->

                                                                            <div class="widget-user-header text-white"
                                                                                 style="background: url('{{asset("img/photo4.jpg")}}') center center;">

                                                                                <h3 class="widget-user-username"></h3>
                                                                                <h5 class="widget-user-desc"></h5>
                                                                            </div>

                                                                            <div class="widget-user-image">
                                                                                <img style="border-radius: 100px !important;" class="img-circle" src="{{asset('img/user2-160x160.jpg')}}" alt="User Avatar">

                                                                            </div>


                                                                            <div class="card-footer text-center">
                                                                                <span class="card-text text-dark">  {{$question->texte}}</span>
                                                                                <br>
                                                                                <div class="btn-group ">
                                                                                    <button type="button" class="btn btn-tool" data-toggle="dropdown" style="border-radius: 200px; background-color: dodgerblue" >
                                                                                        <i class="fa fa-search"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu text-center" role="menu">
                                                                                        <a class="dropdown-header">Réponse</a>
                                                                                        @foreach($question->reponses as $rep)
                                                                                            <span class="dropdown-item-text" style="color: {{$rep->pivot->correct==1 ? '#00C851;' : '#ff4444;'}}">{{$rep->texte}}</span>
                                                                                            <br>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>

                                                                                <div class="btn-group">
                                                                                    <button type="button" class="btn btn-tool" data-toggle="dropdown" style="border-radius: 200px; background-color: deeppink" >
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu" role="menu">
                                                                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#assignModal">Ajouter à une émission</a>
                                                                                        {{--<a href="pages/mailbox/ListeParticipants.html" class="dropdown-item">Ajouter un quiz</a>--}}
                                                                                        {{--<a href="pages/examples/creerEmission.html" class="dropdown-item">Modifie quiz</a>--}}

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <!-- Insertion de la fenetre modale pour assigner les emissiono -->
                                                                    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" style="margin-left: 10%;" aria-labelledby="assignModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color: #2bbbad">
                                                                                    <h4 class="modal-title" id="assignModalLabel"><strong>Assigner à une emission</strong></h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <!-- Form cv-->
                                                                                    <form action="{{route('questiondiffusion.store')}}" method="post">
                                                                                        @csrf
                                                                                        <div class="container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="md-form" style="padding-left: 3%" >
                                                                                                        <div class="test">

                                                                                                        </div>
                                                                                                        <select style="width: 100%;" class="form-control  js-example"  id="emission" name="emission" >
                                                                                                            <option selected="selected" value="">Selectionner une emission</option>
                                                                                                            @foreach($emissions as $emission)
                                                                                                                @foreach($emission->emission_diffusions as $diffusion)
                                                                                                                    <option value="{{$diffusion->id}}">{{$emission->name.' '.$diffusion->day.' '.$diffusion->begin_at.' - '.$diffusion->end_at}}</option>
                                                                                                                @endforeach
                                                                                                            @endforeach

                                                                                                        </select>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="md-form" style="padding-left: 8%;">

                                                                                                        <div class="form-control-wrapper">
                                                                                                            <input type="text" id="date-format" name="begin" class="form-control floating-label" placeholder="Begin Date Time">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="md-form" >
                                                                                                        <div class="form-control-wrapper">
                                                                                                            <input type="text" id="date-format1" name="end" class="form-control floating-label" placeholder="End Date Time">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <input type="hidden" value="{{$question->id}}" name="question_id">
                                                                                            <div style="padding-left: 38%">
                                                                                                <button type="submit" class="btn btn-default" >Soumettre</button>
                                                                                            </div>


                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--  Fin Insertion de la fenetre modale pour assigner les emissiono -->
                                                                @endforeach
                                                                {{--{{$questions->links()}}--}}
                                                            @else
                                                                Aucun Quiz enregistré dans la base de donné
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Fin de l'insertion--}}
                            </div>
                            <!--/.Panel 3-->
                        </div>

                    </div>
                    <!-- Div presentation des total -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de participants</span>
                                    <span class="info-box-number">{{\App\Models\Participant::CountParticipant()}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-question"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de quizz</span>
                                    <span class="info-box-number">
                                             {{\App\Models\Question::CountQuiz()}}
                                            </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-tv"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total d'&eacute;mission</span>
                                    <span class="info-box-number">{{\App\Models\Emission::CountEmission()}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>


                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /Fin Div presentation des total -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de creation d'emission -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Vous avez demandé a ajouter une émission</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('emission.store')}}" method="post">
                        @csrf
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name">Nom de l'émission</label>
                        </div>
                        <div class="md-form">
                            <input type="number" id="numero" name="numero" class="form-control">
                            <label for="numero">Numero de l'émission</label>
                        </div>
                        <br>
                        <fieldset>
                            <legend>Jour et heure de diffusion</legend>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="lundi" value="MONDAY" id="lundi" >
                                        <label class="form-check-label"  for="lundi" >MONDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="lundiB" name="lundiB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="lundiE" name="lundiE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mardi" id="mardi"  value="TUESDAY" >
                                        <label class="form-check-label" for="mardi" >TUESDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="mardiB" name="mardiB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="mardiE" name="mardiE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mercredi" id="mercredi"  value="WEDNESDAY">
                                        <label class="form-check-label" for="mercredi" >WEDNESDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="mercrediB" name="mercrediB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="mercrediE" name="mercrediE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="jeudi" id="jeudi" value="THURSDAY"  >
                                        <label class="form-check-label" for="jeudi">THURSDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="jeudiB" name="jeudiB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="jeudiE" name="jeudiE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="vendredi" value="FRIDAY" id="vendredi" >
                                        <label class="form-check-label" for="vendredi" >FRIDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="vendrediB" name="vendrediB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="vendrediE" name="vendrediE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="samedi" value="SATURDAY" id="samedi" >
                                        <label class="form-check-label" for="samedi" >SATURDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="samediB" name="samediB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="samediE" name="samediE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="dimanche" value="dimanche" id="SUNDAY" >
                                        <label class="form-check-label" for="dimanche">SUNDAY</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="dimancheB" name="dimancheB" class="form-control floating-label" placeholder="Heure Debut">
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-control-wrapper">
                                        <input type="text" id="dimancheE" name="dimancheE" class="form-control floating-label" placeholder="Heure Fin">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-blue btn btn-block">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Fin Modal de creation d'emission -->
    <!-- Modal de creation de quiz -->
    <div class="modal fade" id="quizModal"  role="dialog" aria-labelledby="quizModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="quizModalLabel"><strong>Vous avez choisi de creer un quiz</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center" style="background-color: #007bff">
                                <span class="card-text" style="color: white">Formulaire de creation de quiz</span>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('quiz.store')}}">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <select class="form-control js-example-tags1" style="width: 100%;"  id="q_texte" name="q_texte">
                                                        <option selected="selected" value="">Saisissez votre question</option>
                                                        <optgroup label="Question disponible">
                                                            @foreach($questions as $question)
                                                                <option value="{{$question->texte}}">{{$question->texte}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="md-form ">
                                                    <fieldset>
                                                        <legend><span style="color:green;">Réponse</span> <i  style="color: gold" class="fa fa-star"></i></legend>
                                                        <select class="form-control js-example-tags2" style="width: 100%;" id="r_texte1" name="r_texte1" >
                                                            <option selected="selected" value="">Saisissez votre reponse</option>
                                                            <optgroup label="Question disponible">
                                                                @foreach($reponses as $reponse)
                                                                    <option value="{{$reponse->texte}}">{{$reponse->texte}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-form ">
                                                    <fieldset>
                                                        <legend><span style="color:red;">Réponse</span><i style="color: gold" class="fa fa-star-o"></i></legend>
                                                        <select class="form-control js-example-tags2" style="width: 100%;" id="r_texte2" name="r_texte2">
                                                            <option selected="selected" value="">Saisissez votre reponse</option>
                                                            <optgroup label="Question disponible">
                                                                @foreach($reponses as $reponse)
                                                                    <option value="{{$reponse->texte}}">{{$reponse->texte}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-form ">
                                                    <fieldset>
                                                        <legend><span style="color:red;">Réponse</span><i style="color: gold" class="fa fa-star-o"></i></legend>
                                                        <select class="form-control js-example-tags3" style="width: 100%;" id="r_texte3" name="r_texte3">
                                                            <option selected="selected" value="">Saisissez votre reponse</option>
                                                            <optgroup label="Question disponible">
                                                                @foreach($reponses as $reponse)
                                                                    <option value="{{$reponse->texte}}">{{$reponse->texte}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </fieldset>

                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">

                                            <button class="btn btn-outline-blue btn-block" type="submit">Enregistrer</button>
                                        </div>
                                    </div>

                                </form>

                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Fin Modal de creation de quiz -->
@endsection
