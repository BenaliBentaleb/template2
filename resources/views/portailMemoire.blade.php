@extends('layouts.app') @section('content')

<div class="col-md-9 memoire-container">

    <div class="row " style="margin-bottom:5px;">
        <div class="col-md-9" style="padding:6px;">
            <h3 style="display:inline-block;margin-bottom:0px;margin-top:6px;">Portail mémoires&nbsp;</h3>
        </div>
        
        @if(Auth::id())
        <div class="col-md-3 text-right" style="padding:6px;">
            <a href="{{route('ajouter.memoire')}}" class="btn btn-azure">Ajouter mémoire</a>
        </div>
        @endif

    </div>
    <div class="row pub-header text-center" style="margin-bottom:20px;margin-right:-10px;margin-left:-10px;padding-top:7px;padding-bottom:4px;">

        <div class="col-sm-6 text-center" style="margin-top:6px;">
            <span style="font-size:16px;">Triér les années par ordre :&nbsp;</span>
            <ul class="list-inline" style="display:inline-block">
                <li class="order-btn" data-sort="order:asc">ASC</li>
                <li class="order-btn" data-sort="order:descending">DSC</li>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <ul class="list-inline shuffle text-center" style="margin-bottom:0;margin-top:6px;">
                <li class="filter all mixitup-control-active selected" data-filter="all">Tous</li>
                <li class="filter licence-title" data-filter=".licence">Licence</li>
                <li class="filter master-title" data-filter=".master">Master</li>
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
                            <h4 style="margin-top:5px;">Mémoire de {{ucfirst($m->type)}} {{$m->getFormation($m->formation_id)}} {{$m->date}}</h4>
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
                            <p style="margin-top:10px;margin-bottom:0;">Nombre de telechargement : {{$m->counter}}</p>

                            <a href="{{route('download.memoire',['id'=>$m->id])}}" class="btn btn-link btn-block" type="button" style="font-size:16px;">
                                <i class="icon-arrow-down-circle" style="font-size:16px;padding-right:10px;"></i>Télécharger</a>
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
                            <h4 style="margin-top:5px;">Mémoire de {{ucfirst($m->type)}} {{$m->getFormation($m->formation_id)}} {{$m->date}}</h4>
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
                            <p style="margin-top:10px;margin-bottom:0;">Nombre de telechargement : {{$m->counter}}</p>
                            <a href="{{route('download.memoire',['id'=>$m->id])}}" class="btn btn-link btn-block" type="button" style="font-size:16px;">
                                <i class="icon-arrow-down-circle" style="font-size:16px;padding-right:10px;"></i>Télécharger</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif @endforeach



    </div>
</div>

@endsection