<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTICien</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/reclamation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
</head>

<body style="background-color:#edf2f6;font-family:'Nunito Sans', sans-serif;">
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
                                    <a href="{{route('WithoutAuth')}}" class="list-anchor {{ Request::is('WithoutAuth') ? 'active' : '' }} {{ Request::is('/') ? 'active' : '' }}">
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
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master1 {{ Request::is("formation/$formation->nom/*") ? 'active' : '' }}">
                                        <span class="master1-circle">M1</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Master 2'))
                                <li class="list-group-item">
                                    <a href="{{route('formationWithoutAuth',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master2 {{ Request::is("formation/$formation->nom/*") ? 'active' : '' }}">
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


                    @foreach($publications as $publication) 
                   
                    <div class="status">
                        <div class="col-md-12">
                            <ul class="list-inline" style="padding-top:10px;padding-left:10px;">
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
                        <h3 class="status-title">
                            <br>{{$publication->titre}}
                            <br>
                            <br>
                        </h3>
                        <hr>
                         @if($publication->module_id)
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
                                <a href="{{route('publication.filtrer.module',['id'=>$publication->module_id])}}">{{$publication->module->nom}}</a>
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
                
                                <br>
                            </div>
                            @if($publication->type =="FAQ")               
                            <div class="files-uploaded" style="border: 2px solid #50d093;">
                                    <h4 class="files-uploaded-header text-center" style="background-color:#50d093"><span style="color:#fff;">Meilleur réponse</span></h4>
                                    <div class="list-unstyled files-list">                                                         
                                            @foreach($publication->commentaires as $comment)
                                                @if($comment->best_answer == 1)
                                                <div class="single-file text-center" style="margin-bottom:20px;" >
                                                    <span class="text-center">
                                                            <div style="margin:10px">
                                                                    <a href="{{route('user.profile.unregistred',['id'=>$comment->user_id])}}">
                                                                        <img class="avatar avatar-lg" style="background-image:url({{asset($comment->user->profile->photo_profile)}});">
                                                                    </a>
                                                                    <ul class="list-unstyled publisher-info" style="margin-left:10px;display:inline-block;">
                                                                        <li>
                                                                            <a href="{{route('user.profile.unregistred',['id'=>$comment->user_id])}}" >
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
                                    <a href="{{route('login')}}" class="download-file-link" style="float:right;">
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
                    @endforeach
                    <div style="text-align: center">{{$publications->links()}}</div>
                </div>
                           
                <div class="col-md-3">
                  
                    <h4 class="text-center" style="margin-top: 0">Les évènements</h4>
                    <h4  class="text-center"><strong>NTICien - Général</strong></h4>
                    @if(count($events) == 0)
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
                            <h3 class="text-info even-title">{{$event->titre}}</h3>
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
            
                    @endif @endforeach @endif {{--
                    <div class="evenement prof-bar">
                        <a href="#event-collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe2" style="text-decoration:none;">
                            <h3 class="text-info even-title">Event title</h3>
                        </a>
                        <div id="event-collapse2" class="collapse">
                            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                                <br>
                            </p>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:16px;"></i>
                                <span>&nbsp;Date debut :&nbsp;</span>
                                <span>2018-04-06</span>
                            </div>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:17px;"></i>
                                <span>&nbsp;Date fin :&nbsp;</span>
                                <span>2018-05-05</span>
                            </div>
                            <span class="publisher">Publier par :</span>
                            <div>
                                <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                                <ul class="list-unstyled publisher-info">
                                    <li>
                                        <strong>Bentaleb Youssouf</strong>
                                    </li>
                                    <li>
                                        <span class="role-prof">Enseignant</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="evenement club-bar">
                        <a href="#event-collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe3" style="text-decoration:none;">
                            <h3 class="text-info even-title">Event title</h3>
                        </a>
                        <div id="event-collapse3" class="collapse">
                            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                                <br>
                            </p>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:16px;"></i>
                                <span>&nbsp;Date debut :&nbsp;</span>
                                <span>2018-04-06</span>
                            </div>
                            <div style="font-size:15px;">
                                <i class="icon-calendar" style="font-size:17px;"></i>
                                <span>&nbsp;Date fin :&nbsp;</span>
                                <span>2018-05-05</span>
                            </div>
                            <span class="publisher">Publier par :</span>
                            <div>
                                <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                                <ul class="list-unstyled publisher-info">
                                    <li>
                                        <strong>Bentaleb Youssouf</strong>
                                    </li>
                                    <li>
                                        <span class="role-club">Club GDG</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            
            </div>
   

    






</div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="assets/js/custom-file-input.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/mixitup-multifilter.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/add-memoire.js"></script>
<script src="assets/js/memoire.js"></script>
</body>

</html>