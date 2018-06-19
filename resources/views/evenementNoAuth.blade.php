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
                        <div class="navbar-header"><a class="navbar-brand navbar-image" href="{{route('WithoutAuth')}}" ></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="collapse navbar-collapse" id="navcol-1">
                
                                <a class="navbar-link navbar-right inscrire-btn hidden-xs" href="{{ route('register') }}">S'inscrire</a>
                                <a class="navbar-link navbar-right hidden-xs" href="{{ route('login') }}">S'authentifier</a>
                                <ul class="navbar-link  visible-xs list-unstyled">
                                        <li>
                                            <a class="btn btn-block navbar-link " href="{{ route('login') }}">S'authentifier</a>
                                        </li>
                                        <li>
                                            <a class=" btn btn-block navbar-link navbar-right inscrire-btn" href="{{ route('register') }}">S'inscrire</a>
                                        </li>
                                </ul>
                        </div>
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
                                    <a href="{{route('evenement.unregistred')}}" class="list-anchor active">
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
                
                <div class="col-md-9">

                  
                    <h4 class="text-center">Les évènements du :</h4>
                    <h4  class="text-center"><strong>NTICient - Général</strong></h4>
                    @if(count($nticien_events) == 0)
                    <div class="alert alert-warning" role="alert">Pas d'évenements partagé pour le moment</div>
                    @else 
                    @foreach($nticien_events as $ev)
                        @if($ev->is_archived == 0)
                        <div class="evenement 
                        @if($ev->event_role =='Administrateur' )
                            admin-bar
                        @elseif($ev->event_role =='Enseignant')
                            prof-bar
                        @else
                            club-bar
                        @endif
                        ">
                        <a href="#event-collapse{{$ev->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$ev->id}}"
                            style="text-decoration:none;">
                            <h3 class="text-info even-title">{{$ev->titre}}</h3>
                        </a>
                        <div id="event-collapse{{$ev->id}}" class="collapse in">
                            <p>{{ $ev->description}}
                                <br>
                            </p>
                            <p>
                                {!! $ev->contenu !!}
                                    
                            </p>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:16px;"></i>
                                <span>&nbsp;Date debut :&nbsp;</span>
                                <span>{{ $ev->debut}}</span>
                            </div>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:17px;"></i>
                                <span>&nbsp;Date fin :&nbsp;</span>
                                <span>{{ $ev->fin }}</span>
                            </div>
                            {{-- <span class="publisher">Publier par :</span> --}}
                            <div style="margin-top:10px">
                                <a href="{{route('user.profile.unregistred',['id'=>$ev->user_id])}}">
                                    <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($ev->user->profile->photo_profile)}});">
                                </a>
                                <ul class="list-unstyled publisher-info">
                                    <li style="display: block;margin-left: 40px;">
                                        <a href="{{route('user.profile.unregistred',['id'=>$ev->user_id])}}">
                                            <strong>{{$ev->user->nom . ' ' . $ev->user->prenom }}</strong>
                                        </a>
                                    </li>
                                    <li>
                                        @foreach($ev->user->roles as $role) @if($role->nom == "Administrateur")
                                        <span class="role-admin">{{$role->nom}}</span>
                                        @elseif($role->nom == "Enseignant")
                                        <span class="role-prof">{{$role->nom}}</span>
                                        @elseif($role->nom == "Gérant club")
                                        <span class="role-club">{{$role->nom}}</span>
                                        @elseif($role->nom =="Etudiant")
                                        <span class="role-etud"> {{$role->nom}}</span>
                                        @endif @endforeach
    
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        @endif
                    @endforeach
                       
                    @endif
    
    
    
    
                    <h3 class="text-center" style="margin:20px 0;">Les évènements des autre départements</h3>
                    
                    @if(count($events) == 0)
                    <div class="alert alert-warning" role="alert">Pas d'évenements partagé pour le moment</div>
                    @else 
                    @foreach($events as $ev)
                        <h4  class="">Événement du : <strong>{{ $ev->formation->nom }}</strong></h4>
                        @if($ev->is_archived == 0)
                        <div class="evenement 
                        @if($ev->event_role =='Administrateur' )
                            admin-bar
                        @elseif($ev->event_role =='Enseignant')
                            prof-bar
                        @else
                            club-bar
                        @endif
                        ">
                        <a href="#event-collapse{{$ev->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$ev->id}}"
                            style="text-decoration:none;">
                            <h3 class="text-info even-title">{{$ev->titre}}</h3>
                        </a>
                        <div id="event-collapse{{$ev->id}}" class="collapse in">
                            <p>{{ $ev->description}}
                                <br>
                            </p>
                            <p>
                                {!! $ev->contenu !!}
                                    
                            </p>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:16px;"></i>
                                <span>&nbsp;Date debut :&nbsp;</span>
                                <span>{{ $ev->debut}}</span>
                            </div>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:17px;"></i>
                                <span>&nbsp;Date fin :&nbsp;</span>
                                <span>{{ $ev->fin }}</span>
                            </div>
                            {{-- <span class="publisher">Publier par :</span> --}}
                            <div style="margin-top:10px">
                                <a href="{{route('user.profile.unregistred',['id'=>$ev->user_id])}}">
                                    <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($ev->user->profile->photo_profile)}});">
                                </a>
                                <ul class="list-unstyled publisher-info">
                                    <li style="display: block;margin-left: 40px;">
                                        <a href="{{route('user.profile.unregistred',['id'=>$ev->user_id])}}">
                                            <strong>{{$ev->user->nom . ' ' . $ev->user->prenom }}</strong>
                                        </a>
                                    </li>
                                    <li>
                                        @foreach($ev->user->roles as $role) @if($role->nom == "Administrateur")
                                        <span class="role-admin">{{$role->nom}}</span>
                                        @elseif($role->nom == "Enseignant")
                                        <span class="role-prof">{{$role->nom}}</span>
                                        @elseif($role->nom == "Gérant club")
                                        <span class="role-club">{{$role->nom}}</span>
                                        @endif @endforeach
    
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        @endif
                    @endforeach
                       
                    @endif
                        
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