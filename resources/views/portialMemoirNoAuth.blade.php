<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NTICien</title>
    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/reclamation.css')}}">

    
    <link rel="stylesheet" href="{{asset('assets/css/Navigation-Clean.css')}}">
  
   
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
 
  
    
</head>
<body style="background-color:#edf2f6;">
        <div>
                <nav class="navbar navbar-default navigation-clean-search navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header"><a class="navbar-brand navbar-image" href="{{route('WithoutAuth')}}" style="margin-left:0px;"></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div
                            class="collapse navbar-collapse" id="navcol-1">
                        
                            <form class="navbar-form navbar-left" target="_self">
                            </form>
                            <a class="navbar-link navbar-right inscrire-btn" href="{{ route('register') }}">S'inscrire</a>
                            <a class="navbar-link navbar-right" href="{{ route('login') }}">S'authentifier</a></div>
            </div>
            </nav>
            </div>

    <div style="margin-top:20px;">
        <div class="container" style="margin-top:97px;">
            <div class="row">
                    <div class="col-md-3">
                            <ul class="list-group side-bar">
                                <li class="list-group-item" style="padding-top:10px;">
                                    <a href="{{route('WithoutAuth')}}" class="list-anchor">
                                        <span class="nticien-circle">
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <span>Acceuil - NTICien</span>
                                    </a>
                                </li>
                                @foreach($departement as $dep)
                                <li class="list-group-item departement">
                                    <i class="icon-grid"></i>
                                    <span class="departement" style="font-weight:bold;">Dépratement :{{$dep->nom}}</span>
                                </li>


                                @foreach($dep->formation as $formation) @if(str_contains($formation->nom,'Tronc Commun'))

                                <li class="list-group-item">
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor ">
                                        <span class="l1-circle">{{ substr($formation->nom,0,2) }}</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Licence'))
                                <li class="list-group-item">
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-l3">
                                        <span class="licence-circle">L3</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Master 1'))
                                <li class="list-group-item">
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master1">
                                        <span class="master1-circle">M1</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Master 2'))
                                <li class="list-group-item">
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master2">
                                        <span class="master2-circle">M2</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @endforeach @endforeach


                                <li class="list-group-item border-top">
                                    <a href="{{route('evenement.unregistred')}}" class="list-anchor">
                                        <i class="icon-bell icon-sidebar"></i>
                                        <span style="font-size:15px;">Les évenements</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('portail.memoire.withoutAuth')}}" class="list-anchor">
                                        <i class="icon-graduation icon-sidebar"></i>
                                        <span style="font-size:15px;">Portail mémoires</span>
                                    </a>
                                </li>
                             
                            </ul>
              
              
                   

                </div>
                <div class="col-md-9 memoire-container">
                        <div class="row " style="margin-bottom:5px;">
                                <div class="col-md-9" style="padding:6px;">
                                    <h3 style="display:inline-block;margin-bottom:0px;margin-top:6px;">Portail mémoires&nbsp;</h3>
                                </div>
                                
                               
                                <div class="col-md-3 text-right" style="padding:6px;">
                                    <a href="{{route('ajouter.memoire')}}" class="btn btn-azure">Ajouter mémoire</a>
                                </div>
                               
                        
                            </div>
                    <div class="row pub-header text-center" style="margin-bottom:20px;margin-right:-10px;margin-left:-10px;padding-top:7px;padding-bottom:4px;">

                        <div class="col-sm-6 text-center" style="margin-top:6px;">
                            <span style="font-size:16px;">Triér les années par ordre :&nbsp;</span>
                            <ul class="list-inline" data-mixitup-control style="display:inline-block">
                                <li class="order-btn" data-mixitup-control data-sort="order:asc">ASC</li>
                                <li class="order-btn"  data-mixitup-control data-sort="order:descending">DSC</li>
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
                                            <p style="margin-top:10px;margin-bottom:0;">Nombre de telechargement: {{$m->counter}}</p>
                
                                            <a href="{{route('download.memoire',['id'=>$m->id,'number'=>$m->counter])}}" class="btn btn-link btn-block" type="button" style="font-size:16px;">
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
            </div>
        </div>
    </div>
  <!-- Scripts -->


    <script src="{{asset('assets/js/jquery.min.js') }}"></script>
    
    
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>-->
    <script src="{{ asset('assets/js/custom-file-input.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="{{asset('assets/js/custom-file-input.js')}}"></script>


    <script src="{{ asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('assets/js/mixitup-multifilter.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>