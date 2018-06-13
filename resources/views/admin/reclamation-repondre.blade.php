<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>NTICien - Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">

    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/vendors/mixitup.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/core.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>



</head>

<body class="">
    <div class="page" id="app1">

        <div class="page-main">

            <div class="header py-4">

                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{{route('home')}}">
                            <img src="{{asset('assets/img/logo.svg')}}" class="header-brand-img" alt="tabler logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">


                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar" style="background-image: url({{asset(Auth::user()->profile->photo_profile)}})"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default">{{Auth::user()->nom}} {{Auth::user()->prenom}}</span>
                                        <small class="text-muted d-block mt-1">Administrateur</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('user.profile',['id'=>Auth::id()]) }}">
                                        <i class="dropdown-icon fe fe-user"></i> Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="dropdown-icon fe fe-home"></i> Page d'acceuil
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fe fe-log-out"></i> Déconnecter
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </a>





                                </div>
                            </div>
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item">
                                    <a href="{{route('admin.index')}}" class="nav-link ">
                                        <i class="fe fe-home"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.utilisateur')}}" class="nav-link ">
                                        <i class="fe fe-users"></i> Utilisateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.departement')}}" class="nav-link">
                                        <i class="fe fe-box"></i> Départements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.formation')}}" class="nav-link">
                                        <i class="fe fe-briefcase"></i> Formations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.utilisateur.publications')}}" class="nav-link">
                                        <i class="fe fe-check-square"></i> Publications</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.event')}}" class="nav-link ">
                                        <i class="fe fe-calendar"></i> Événements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.reclamation')}}" class="nav-link active">
                                        <i class="fe fe-alert-triangle"></i> Réclamations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.memoire')}}" class="nav-link ">
                                        <i class="fe fe-book"></i> Mémoires </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.module')}}" class="nav-link">
                                        <i class="fe fe-book-open"></i> Modules </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Réclamation : {{ $reclamation->title }}</h3>

                                @if($reclamation->status ==0)
                                <div class="ml-auto">
                                    Marquer comme :

                                    <a href="{{route('admin.reclamation.terminer',['id' => $reclamation->id])}}" class="btn badge badge-success p-2">Terminé</a>

                                    <a href="{{route('admin.reclamation.rejeter',['id' => $reclamation->id])}}" class="btn badge badge-danger p-2">Rejeté</a>
                                </div>
                                @endif



                            </div>
                            <div class="card-body">

                                <div class="form-group">

                                    <div class="form-group">
                                        <div class="row gutters-xs">
                                            <div class="col-3 my-2">
                                                Le propriétaire
                                            </div>
                                            <div class="col-9">
                                                <a href="#" class="nav-link pl-0 pr-0 leading-none">
                                                    <span class="avatar" style="background-image: url({{ asset($reclamation->user->profile->photo_profile) }})"></span>
                                                    <span class="ml-2 d-none d-lg-block">
                                                        <span class="text-default">{{ $reclamation->user->nom . ' ' . $reclamation->user->prenom}}</span>
                                                        <small class="text-muted d-block mt-1">
                                                            @foreach($reclamation->user->roles as $role) @if($role->nom == "Administrateur")
                                                            <span class="role-admin">Administrateur</span>
                                                            @elseif($role->nom =="Enseignant")
                                                            <span class="role-prof">Enseignant</span>
                                                            @elseif($role->nom =="Gérant club")
                                                            <span class="role-club">Gérant Club</span>
                                                            @elseif($role->nom =="Etudiant")
                                                            <span class="role-etudiant">Etudiant</span>
                                                            @endif @endforeach

                                                        </small>

                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    
                                    <div class="form-group">
                                        <div class="row gutters-xs">
                                            <div class="col-3 my2">
                                                Formation
                                            </div>

                                            <div class="col-6">
                                                @if($reclamation->user->profile->formation)
                                                
                                                {{$reclamation->user->profile->formation->nom}} 
                                                @else
                                                Étudiant extérieur

                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row gutters-xs">
                                            <div class="col-3 my-2">
                                                <span class="">Type de récmamation :</span>

                                            </div>
                                            <div class="col-4">

                                                <input type="text" class="form-control" name="example-disabled-input" value="{{ $reclamation->Type }}" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row gutters-xs">
                                            <div class="col-3 my-2">
                                                <span class="">Contenu :</span>

                                            </div>
                                            <div class="col-9 my-2">

                                                <p> {{ $reclamation->reclamation }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my-2">
                                                    <span class="">Le fichier attaché :</span>
                                                </div>
                                                <div class="col-9 my-2">
                                                    @if($reclamation->fichier)
                                                    <a href="{{ route('reclamation.download',['id'=>$reclamation->id]) }}" class="btn btn-link pt-0" style="text-decoration:none"><i class="fe fe-download"></i> Téléchargé</a>
                                                    <div class="alert alert-icon alert-danger" role="alert">
                                                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>Faire attention lors le téléchargement des fichiers uploader par les utilisateurs !
                                                    </div>
                                                    @else
                                                    --

                                                    @endif
                                                </div>
                                                
                                            </div>
    
                                    </div>
                                    
                                    <div class="form-group">
                                        <span>Chat :</span>
                                        @if(count($chat) == 0)
                                            <div role="alert" class="alert alert-warning" style="margin-bottom:40px; margin-top:30px">
                                                Pas de messages ! 
                                            </div>
                                        @else
                                        <div class="row reclamation-chat-content mt-2" style="@if(count($chat)<=2)     height: -webkit-calc(25vh); "@endif>
                                            <div class="form-group col-11 mx-auto chat-content"  >
                                                <div class="messages">

                                                    @foreach($chat as $c) @if($c->sender_id == Auth::id())
                                                    <div class="msg-recieved">
                                                        <span class="msg-time">{{$c->created_at->diffForHumans()}}</span>
                                                        <div class="clearfix"></div>
                                                        <p>
                                                            {{$c->chat}}
                                                            <br>
                                                        </p>
                                                    </div>


                                                    @else
                                                    <div class="msg-sent">

                                                        <span class="avatar" style="background-image:url({{ asset(\App\User::getProfile($c->sender_id)->photo_profile)}})">
                                                        </span>
                                                        <span class="msg-time">{{$c->created_at->diffForHumans()}}</span>
                                                        <p>
                                                            {{$c->chat}}
                                                            <br>
                                                        </p>
                                                    </div>
                                                    @endif

                                                    <div class="clearfix"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    @if($reclamation->status ==0)
                                    <div class="form-group">
                                        <div class="row gutters-xs">
                                            <div class="col-3 my-2">
                                                <span class="">Réponse :</span>

                                            </div>
                                            <div class="col-9 my-2">
                                                <form method="post" action="{{route('admin.reclamation.oo',['id' => $reclamation->id ])}}">
                                                    {{csrf_field()}}



                                                    <textarea required rows="2" name="msg" class="form-control"></textarea>
                                                    <input type="submit" class="btn btn-primary mt-2" value="Envoyer">


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                </div>



                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <a href="{{route('admin.reclamation')}}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
</body>

</html>