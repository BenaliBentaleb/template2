@extends('layouts.app') @section('content')

<div class="col-md-9 memoire-container">

    <div class="row " style="margin-bottom:5px;">
        <div class="col-md-9" style="padding:6px;">
            <h3 style="display:inline-block;margin-bottom:0px;margin-top:6px;">Portail mémoires&nbsp;</h3>
        </div>

        @auth
        <div class="col-md-3 text-right" style="padding:6px;">
            <a href="{{route('ajouter.memoire')}}" class="btn btn-azure">Ajouter mémoire</a>
        </div>
        @endauth

    </div>
    <div class="row pub-header text-center" style="margin-bottom:20px;margin-right:-10px;margin-left:-10px;padding-top:7px;padding-bottom:4px;">

        <div class="col-sm-6 text-center" style="margin-top:6px;">
            <span style="font-size:16px;">Triér les années par ordre :&nbsp;</span>
            <ul class="list-inline" data-mixitup-control style="display:inline-block">
                <li class="order-btn" data-mixitup-control data-sort="order:asc">ASC</li>
                <li class="order-btn" data-mixitup-control data-sort="order:descending">DSC</li>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <ul class="list-inline shuffle text-center" style="margin-bottom:0;margin-top:6px;">
                <li class="filter all mixitup-control-active selected" data-mixitup-control data-filter="all">Tous</li>
                <li class="filter licence-title" data-mixitup-control data-filter=".licence">Licence</li>
                <li class="filter master-title" data-mixitup-control data-filter=".master">Master</li>
            </ul>
        </div>
    </div>

    <div class="row memoires">

        @foreach($memoire as $m) @if($m->type == "licence")
        <div class="col-md-6 mix licence" style="padding-right:5px;padding-left:5px;" data-order="{{$m->date}}">
            <div class="memoire">
                <div class="row memoire-row" style="margin-right:0;">
                    <div class="col-lg-6 col-md-7 col-sm-4 col-xs-12 text-center" style="padding-right:0;">
                        <div class="memoire-thumb" style="background-image:url(&quot;{{asset('assets/img/memoire-licence.png')}}&quot;);">
                            <div class="text-center memoire-titre">
                                <h3>{{$m->titre}}
                                    <br>
                                    <br>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-8 col-xs-12" style="padding-left:0;">
                        <div class="memoire-contenu">
                            <div class="col-md-10  @if(Auth::id() == $m->user_id || Auth::user()->isAdmin()) pull-left @endif" style="padding:0;">
                                <h4 style="margin-top:5px;">Mémoire de {{$m->getFormation($m->formation_id)}} {{$m->date}}</h4>
                            </div>
                            @if(Auth::id() == $m->user_id || Auth::user()->isAdmin())
                            <div class="col-md-2 pull-right" style="padding-top:6px;">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical" style="padding:5px;font-size:15px;color:#4e4e4e"></i>
                                    </a>
                                    <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-right:-6px;">
                                        <li>
                                            <a href="{{route('modifie.memoire',['id' => $m->id ])}}">
                                                <i class="fe fe-edit"></i>
                                                <span>&nbsp; Modifier</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="delete-memoire" href="{{route('delete.memoire',['id' => $m->id ])}}">
                                                <i class="fe fe-trash"></i>
                                                <span>&nbsp; Supprimer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif

                            <h5 style="margin-top:0px;margin-bottom:0;font-weight:bold;">Réaliser par :</h5>
                            <ul style="padding-left:16px;">
                                <li>{{$m->etudiant1}}&nbsp;
                                    <br>
                                </li>
                                @if($m->etudiant2)
                                <li>{{$m->etudiant2}}&nbsp;
                                    <br>
                                </li>
                                @endif @if($m->etudiant3)
                                <li>{{$m->etudiant3}}&nbsp;
                                    <br>
                                </li>
                                @endif @if($m->etudiant4)
                                <li>{{$m->etudiant4}}&nbsp;
                                    <br>
                                </li>
                                @endif

                            </ul>
                            <h5 style="margin-top:10px;margin-bottom:0;font-weight:bold;">Encadré par :</h5>
                            <p style="margin-bottom:0px;">Dr. {{$m->encadreur}}
                                <br>
                            </p>
                            <div style="position: absolute;bottom: -85px;">
                                <h5 style="display:inline-block;margin-top:5px;margin-bottom:0px;">Uploadé par:</h5>
                                <a class="h6" href="{{route('user.profile',['id'=> $m->id])}}">{{$m->user->nom}} {{$m->user->prenom}}</a>
                                <downloadmemoire :id="{{$m->id}}"></downloadmemoire>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif @if($m->type == "master")
        <div class="col-md-6 mix master" style="padding-right:5px;padding-left:5px;" data-order="{{$m->date}}">
            <div class="memoire">
                <div class="row memoire-row" style="margin-right:0;">
                    <div class="col-lg-6 col-md-7 col-sm-4 col-xs-12 text-center" style="padding-right:0;">
                        <div class="memoire-thumb" style="background-image:url(&quot;{{asset('assets/img/memoire-master.png')}}&quot;);">
                            <div class="text-center memoire-titre">
                                <h3>{{$m->titre}}

                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-8 col-xs-12" style="padding-left:0;">
                        <div class="memoire-contenu">
                            <div class="col-md-10 @if(Auth::id() == $m->user_id || Auth::user()->isAdmin()) pull-left @endif" style="padding:0;">
                                <h4 style="margin-top:5px;">Mémoire de {{$m->getFormation($m->formation_id)}} {{$m->date}}</h4>
                            </div>
                            @if(Auth::id() == $m->user_id || Auth::user()->isAdmin())
                            <div class="col-md-2 pull-right" style="padding-top:6px;">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical" style="padding:5px;font-size:15px;color:#4e4e4e"></i>
                                    </a>
                                    <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-right:-6px;">
                                        <li>
                                            <a href="{{route('modifie.memoire',['id' => $m->id ])}}">
                                                <i class="fe fe-edit"></i>
                                                <span>&nbsp; Modifier</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="delete-memoire" href="{{route('delete.memoire',['id' => $m->id ])}}">
                                                <i class="fe fe-trash"></i>
                                                <span>&nbsp; Supprimer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                            <h5 style="margin-top:20px;margin-bottom:0;">Réaliser par :</h5>
                            <ul style="padding-left:16px;">
                                <li>{{$m->etudiant1}}&nbsp;
                                    <br>
                                </li>
                                @if($m->etudiant2)
                                <li>{{$m->etudiant2}}&nbsp;
                                    <br>
                                </li>
                                @endif @if($m->etudiant3)
                                <li>{{$m->etudiant3}}&nbsp;
                                    <br>
                                </li>
                                @endif @if($m->etudiant4)
                                <li>{{$m->etudiant4}}&nbsp;
                                    <br>
                                </li>
                                @endif
                            </ul>
                            <h4 style="margin-top:10px;margin-bottom:0;">Encadré par :</h4>
                            <p>Dr. {{$m->encadreur}}
                                <br>
                            </p>
                            <div style="position: absolute;bottom: -85px;">
                                <h5 style="display:inline-block;margin-top:5px;margin-bottom:0px;">Uploadé par:</h5>
                                <a class="h6" href="{{route('user.profile',['id'=> $m->id])}}">{{$m->user->nom}} {{$m->user->prenom}}</a>
                                <downloadmemoire :id="{{$m->id}}"></downloadmemoire>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @endif @endforeach



    </div>
</div>

@endsection