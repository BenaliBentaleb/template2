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

<body style="background-color:#edf2f6;font-family:'Nunito Sans', sans-serif;">
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
    <div class="container" style="margin-top:97px;">
        <div class="row">
            <div class="col-md-12" style="padding:0;">
       
       
        <div class="profile-cover" style="background:url({{asset($user->profile->coverture)}});background-size:cover;background-repeat:no-repeat;background-position:center center;background-attachment:fixed;">
           
        </div>
    
</div>
<div class="col-md-10 col-md-offset-1 profile" style="margin-top:-100px;">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div>

                   
                   
                    <div class="profile-img" style="background-image:url({{asset($user->profile->photo_profile)}});background-size:cover;background-repeat:no-repeat;">
                        
                    </div>
           
                <ul class="list-inline social-links text-center">
                    <li class="facebook">
                        <a href="{{$user->profile->facebook}}">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->instagram}}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->twitter}}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->youtube}}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>

                   
                
               
        

            </div>
        </div>
        <div class="col-sm-8">
            <div class="user-info">
                <h2>{{$user->nom.' '. $user->prenom}}</h2>
                @if($formation_user)
                <h5>{{ $formation_user->nom}}</h5>
                @endif
                <ul style="padding-left:0;">
                    @foreach($user->roles as $role) @if($role->nom == "Administrateur")
                    <li class="role-admin">{{$role->nom}}</li>
                    @endif @if($role->nom == "Enseignant")
                    <li class="role-prof">{{$role->nom}}</li>
                    @endif @if($role->nom == "Gérant club")
                    <li class="role-club">{{$role->nom}}</li>
                    @endif @if($role->nom == "Etudiant")
                    <li class="role-etud">{{$role->nom}}</li>
                    @endif @endforeach



                </ul>
                <div>
                    <span style="font-size:16px;font-weight:bold;">&nbsp;A propos :</span>
                    <p>{{$user->profile->information}}
                        <br>
                    </p>
                    <div style="margin-bottom:10px;">
                        <h4 style="font-size:16px;font-weight:bold;">Informations personnels :</h4>
                        <div style="margin-top:5px;margin-bottom:5px;">
                            <span style="font-weight:bold;">Email :&nbsp;</span>
                            <span>{{$user->profile->email}}</span>
                        </div>
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Numéro de téléphone :&nbsp;</span>
                            <span>+213-{{$user->profile->telephone}}</span>
                        </div>
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Date de naissance :&nbsp;</span>
                            <span>{{$user->profile->date_naissance}}</span>
                        </div>
                        <div>
                            <span style="font-weight:bold;">Adresse :&nbsp;</span>
                            <span>{{$user->profile->addresse}}.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
        <div class="row pub-header" style="margin-top:20px;">
            <div class="col-sm-8" style="margin-bottom:10px;">
                <h4 style="display:inline-block;margin-top:20px;margin-bottom:0px;">Les publication partagé par :&nbsp;</h4>
                <h4 style="display:inline-block;margin-top:0px;">{{$user->nom.' '.$user->prenom }}</h4>
            </div>
          
        </div>
        <div class="row">
            @if(count($publications)) @foreach($publications as $publication)
            <div class="col-md-6" style="padding-left:0;">
        
                <div class="status">
                    <div class="row">
                        <div class="col-xs-10" style="padding-right:0;">
                            <a href="profile.html">
                                <img class="publisher-image" style="background-image:url(&quot;{{asset($publication->user->profile->photo_profile)}}&quot;);width:55px;height:55px;margin-top:15px;margin-left:10px;">
                            </a>
                            <ul class="list-inline" style="padding-top:10px;padding-left:10px;width:74%;">
                                <li>
                                    <ul class="list-unstyled publisher-info">
                                        <li class="publisher-name">
                                            <a href="{{route('user.profile',['id'=>$user->id])}}">
                                                <strong>{{$user->nom}} {{$user->prenom}}</strong>
                                                <br>
                                            </a>
                                        </li>
                                        <li>
                                            <ul style="padding-left:0;">
                                                @foreach($user->roles as $role) @if($role->nom == "Administrateur")
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
                        <div class="col-xs-2" style="padding-left:0;">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-options status-options" style="padding:5px;"></i>
                                </a>
                                <ul class="list-unstyled dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{{route('publication.modifier',['id'=>$publication->id])}}">
                                            <i class="icon-pencil"></i>
                                            <span>&nbsp; Modifier</span>
                                        </a>
                                    </li>
        
                                    <li>
                                        <a  id="supprimer-btn"  href="{{route('publication.destroy',['id'=>$publication->id])}}">
                                            <i   class="icon-trash"></i>
                                            <span>&nbsp; Supprimer</span>
                                        </a>
                                    </li>
        
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="status-title" style="margin-top:10px;">{{$publication->titre}}
                        <br>
                    </h3>
                    <hr>
                    @if($publication->module_id)
                        <div style="text-align:center;">
                            <span>Status de module :&nbsp;</span>
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
                        <div class="content">{!! $publication->contenu !!}
                            <br>
                        </div>
                        
                    </div>
        
                    @if( count($publication->publication_avec_fichier))
                    <div class="files-uploaded">
                        <h4 class="files-uploaded-header">Les fichiers Télécharger</h4>
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
                                <span>J'aime</span>
                            </a>
            
                        </div>
                        <div class="comment">
                            <a href="{{route('login')}}">
                                <i class="icon-bubble"></i>
                                <span>Commenter</span>
                            </a>
            
                        </div>
                    </div>
        
        
                </div>
        
            </div>
            @endforeach @else
            <h1 class="text-center">accune publication</h1>
            @endif
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