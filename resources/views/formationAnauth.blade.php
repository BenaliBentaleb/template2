<!DOCTYPE html>
<html>

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

<body style="background-color:#edf2f6;font-family:'Nunito Sans', sans-serif;">
    <div>
        <nav class="navbar navbar-default navigation-clean-search navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand navbar-image" href="{{route('WithoutAuth')}}" ></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
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
                                <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor {{ Request::is("formation/$formation->nom/withoutAuthformation") ? 'active' : '' }}">
                                    <span class="l1-circle">{{ substr($formation->nom,0,2) }}</span>
                                    <span>{{$formation->nom}}</span>
                                </a>
                            </li>
                            @endif @if(str_contains($formation->nom,'Licence'))
                            <li class="list-group-item">
                                <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-l3 {{ Request::is("formation/$formation->nom/withoutAuthformation") ? 'active' : '' }}">
                                    <span class="licence-circle">L3</span>
                                    <span>{{$formation->nom}}</span>
                                </a>
                            </li>
                            @endif @if(str_contains($formation->nom,'Master 1'))
                            <li class="list-group-item">
                                <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master1 {{ Request::is("formation/$formation->nom/withoutAuthformation") ? 'active' : '' }}">
                                    <span class="master1-circle">M1</span>
                                    <span>{{$formation->nom}}</span>
                                </a>
                            </li>
                            @endif @if(str_contains($formation->nom,'Master 2'))
                            <li class="list-group-item">
                                <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master2 {{ Request::is("formation/$formation->nom/withoutAuthformation") ? 'active' : '' }}">
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

                    <div class="col-md-6">
                      @if(count($publications)==0)
                      <div class="alert alert-warning text-center" role="alert">Pas de publications pour le moment</div>

                      @else
                        @foreach($publications as $module) 
                        @if(count($module->publications) == 0 )
                        
                        <div class="alert alert-warning text-center" role="alert">Pas de publications pour le moment</div>
                        @break
                        @else
                            @foreach($module->publications as $publication) 
                                @if($publication->signaler == 0)
                                <div class="status">
                                    <div class="col-md-12">
                                        <ul class="list-inline">
                                            <li>
                                                <img class="publisher-image" style="background-image:url({{asset($publication->user->profile->photo_profile)}});">
                                            </li>
                                            <li>
                                                <ul class="list-unstyled publisher-info">
                                                    <li class="publisher-name"><a href="{{route('user.profile.unregistred',['id'=>$publication->user->id])}}">{{$publication->user->nom}} {{$publication->user->prenom}}</a></li>
                                                    <li>
                                                        <ul style="padding-left:0;" style="padding-left:0;">
                                                            @foreach($publication->user->roles as $role) @if($role->nom == "Administrateur")
                                                            <li class="role-admin">{{$role->nom}}</li>
                                                            @endif @if($role->nom == "Enseignant")
                                                            <li class="role-prof">{{$role->nom}}</li>
                                                            @endif @if($role->nom == "Gérant club")
                                                            <li class="role-club">{{$role->nom}}</li>
                                                            @endif @if($role->nom == "Etudiant")
                                                            <li class="role-etud">{{$role->nom}}</li>
                                                            @endif @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="status-time">{{$publication->created_at->diffForHumans()}}</li>
                                                </ul>
                                            </li>
                                        </ul>
                                       
                                    </div>
                                    <h3 class="status-title">{{$publication->titre}}</h3>
                                    <hr> @if($publication->module_id)
                                    <div style="text-align:center;">
                                        <span>
                                                @if($publication->type =="Sondage")
                                                Sondage
                                                @elseif($publication->type =="FAQ")
                                                FAQ
                                                @elseif($publication->type =="Status")
                                                Status
                                                @else
                                                Tutoriel
                                                @endif
                                                de module :&nbsp;
                                        </span>
                                    <span class="module">
                                        <a href="{{route('publication.filtrer.module',['id'=>$publication->module_id])}}">{{$publication->module->formation->nom}} - {{$publication->module->nom}}</a>
                                        <br>
                                    </span>
                                </div>
                                @else
                                <div style="text-align:center;">
                                    <span>Status Generale</span>
                        
                                </div>
                                @endif
                                    <div>
                                        <div class="content">
                                            {!! $publication->contenu !!}
                                            <br> </div>
                                            @if($publication->type =="FAQ")               
                                    <div class="files-uploaded" style="border: 2px solid #50d093;">
                                            <h4 class="files-uploaded-header text-center" style="background-color:#50d093"><span style="color:#fff;">Meilleur réponse</span></h4>
                                            <div class="list-unstyled files-list">                                                         
                                                    @foreach($publication->commentaires as $comment)
                                                        @if($comment->best_answer == 1)
                                                        <div class="single-file text-center" style="margin-bottom:20px;" >
                                                            <span class="text-center">
                                                                    <div style="margin:10px">
                                                                            <a href="{{route('user.profile',['id'=>$comment->user_id])}}">
                                                                                <img class="avatar avatar-lg" style="background-image:url({{asset($comment->user->profile->photo_profile)}});">
                                                                            </a>
                                                                            <ul class="list-unstyled publisher-info" style="margin-left:10px;display:inline-block;">
                                                                                <li>
                                                                                    <a href="{{route('user.profile',['id'=>$comment->user_id])}}" >
                                                                                        <strong>{{$comment->user->nom . ' ' . $comment->user->prenom }}</strong>
                                                                                    </a>
                                                                                    <span >
                                                                                        {{$comment->created_at->diffForHumans()}}
                                                                                    </span>
                                                                                </li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                <span class="text-center" >
                                                                    {{ $comment->commentaire }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                        @break
                                                        @endif
                                                
                                                    @endforeach
                    
                                            </div>
                                        </div>
                                    @endif
                                    </div>

                                    @if( count($publication->publication_avec_fichier))
                                    <div class="files-uploaded">
                                        <h4 class="files-uploaded-header text-center"><span style="color:#fff;">Les fichiers Télécharger</span></h4>
                                        <ul class="list-unstyled files-list">
                                            @foreach($publication->publication_avec_fichier as $fichier)
                                            <li class="single-file">
                                                <span>{{$fichier->nom_fichier}}</span>
                                                <a href="{{route('file.download',['id'=>$fichier->id])}}" class="download-file-link" style="float:right;">
                                                    <i class="icon-arrow-down-circle download-icon"></i>
                                                    <span style="font-size:16px;">&nbsp;Télécharger</span>
                                                </a>
                                            </li>
                                            <li class="clearfix divider"></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    @endif
                                    <hr style="width:100%;">
                                    <div style="text-align:center;margin-top:10px;margin-bottom:10px;">
                                            <div class="like">
                                                <a href="{{route('login')}}">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                    <span>J'aime({{$publication->likes->count()}})</span>
                                                </a>
                                
                                            </div>
                                            <div class="comment">
                                                <a href="{{route('login')}}">
                                                    <i class="icon-bubble"></i>
                                                    <span>Commenter({{$publication->commentaires->count()}})</span>
                                                </a>
                                
                                            </div>
                                        </div>
                                </div>
                                @endif 
                            @endforeach 
                        @endif
                        @endforeach
                        @endif
                     
                    </div>

                    <div class="col-md-3">
                           
                            <h4 class="text-center">Les évènements du :</h4>
                            <h4  class="text-center"><strong>{{ $formation_nom->nom }}</strong></h4>
                            @if(count($events) == 0 || \App\Event::AllArchived($events))
                            <div class="alert alert-warning" role="alert">Pas d'évenements partagé pour le moment</div>
                            @else @foreach($events as $event) @if($event->is_archived == 0)
                            <div class="evenement 
                                @if($event->event_role =='Administrateur' )
                                    admin-bar
                                @elseif($event->event_role =='Enseignant')
                                    prof-bar
                                @else
                                    club-bar
                                @endif
                                ">
                                <a href="#event-collapse{{$event->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$event->id}}"
                                    style="text-decoration:none;">
                                    <h3 class="text-info even-title ">{{$event->titre}}</h3>
                                </a>
                                <div id="event-collapse{{$event->id}}" class="collapse in">
                                    <p>{{ $event->description}}
                                        <br>
                                    </p>
                                    <div style="font-size:15px;">
                                        <i class="icon-calendar" style="font-size:16px;"></i>
                                        <span>&nbsp;Date debut :&nbsp;</span>
                                        <span>{{ $event->debut}}</span>
                                    </div>
                                    <div style="font-size:15px;">
                                        <i class="icon-calendar" style="font-size:17px;"></i>
                                        <span>&nbsp;Date fin :&nbsp;</span>
                                        <span>{{ $event->fin }}</span>
                                    </div>
                                    {{-- <span class="publisher">Publier par :</span> --}}
                                    <div style="margin-top:10px">
                                        <a href="{{route('user.profile.unregistred',['id'=>$event->user_id])}}">
                                            <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($event->user->profile->photo_profile)}});">
                                        </a>
                                        <ul class="list-unstyled publisher-info">
                                            <li>
                                                <a href="{{route('user.profile.unregistred',['id'=>$event->user_id])}}">
                                                    <strong>{{$event->user->nom . ' ' . $event->user->prenom }}</strong>
                                                </a>
                                            </li>
                                            <li>
                                                @foreach($event->user->roles as $role) @if($role->nom == "Administrateur")
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
            
                            @endif @endforeach @endif 
                        </div>
                </div>
            </div>
       
    </div>



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