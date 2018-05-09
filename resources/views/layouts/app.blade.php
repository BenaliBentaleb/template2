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
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/reclamation.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/Navigation-Clean.css')}}">
</head>

<body style="font-family:'Nunito Sans', sans-serif;background-color:#edf2f6;">
    <div id="app">

        <nav class="navbar navbar-default navigation-clean-search navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <a class="navbar-brand navbar-image" href="{{route('home')}}" style="margin-left:0px;"></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="active" role="presentation">
                       @auth
                       <notification   :id_auth="'{{ Auth::id() }}'" ></notification>
                      
                        <unreadnot></unreadnot>
                        <audio  id="noty">
                            <source src="{{ asset('notification/definite.mp3') }}" type="">
                        </audio>
                        @endauth
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" target="_self">
                        <div class="form-group">
                            <label class="control-label" for="search-field">
                                <i class="glyphicon glyphicon-search"></i>
                            </label>
                            <input class="form-control search-field" type="search" name="search" id="search-field">
                        </div>
                    </form>
                    <button class="btn btn-default navbar-btn chat-btn" type="button">
                        <i class="icon-bubbles"></i>
                    </button>
                  

                    @guest

                    <a class="navbar-link navbar-right" href="{{ route('login') }}">S'authentifier</a>
                    <a class="navbar-link navbar-right inscrire-btn" href="{{ route('register') }}">S'inscrire</a>

                    @else
                   

                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation">
                            <a href="{{ route('user.profile',['id'=> Auth::id()]) }}" class="profile-link" style="padding:0;border:2px solid #448ccb;border-radius:50%;">
                                <img class="img-rounded profile-img" src="{{asset(Auth::user()->profile->photo_profile)}}">
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="padding-right:0;padding-left:15px;">{{ Auth::user()->nom.' '.Auth::user()->prenom }}&nbsp;
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="min-width:90%;">
                                <li role="presentation">
                                    <a href="{{ route('user.profile',['id'=> Auth::id()]) }} ">
                                        <i class="fa fa-user-circle-o" style="padding-right:10px;font-size:16px;"></i>Profile</a>
                                </li>
                                <li role="presentation">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> 
                                        <i class="fa fa-sign-out" style="padding-right:10px;font-size:16px;"></i>Déconnecter</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>


                    @endguest

                </div>


            </div>
        </nav>

        <div style="margin-top:20px;">
            <div class="container" style="margin-top:97px;">
                <div class="row">
                    @auth
                   @if($profile == null)
                    
                    
                    <div class="col-md-3">
                            <ul class="list-group side-bar">
                                <li class="list-group-item" style="padding-top:10px;">
                                    <a href="{{route('home')}}" class="list-anchor">
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
                                    <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor ">
                                        <span class="l1-circle">{{ substr($formation->nom,0,2) }}</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Licence'))
                                <li class="list-group-item">
                                    <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-l3">
                                        <span class="licence-circle">L3</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Master 1'))
                                <li class="list-group-item">
                                    <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master1">
                                        <span class="master1-circle">M1</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @if(str_contains($formation->nom,'Master 2'))
                                <li class="list-group-item">
                                    <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master2">
                                        <span class="master2-circle">M2</span>
                                        <span>{{$formation->nom}}</span>
                                    </a>
                                </li>
                                @endif @endforeach @endforeach
    
    
                                <li class="list-group-item border-top">
                                    <a href="#" class="list-anchor">
                                        <i class="icon-bell icon-sidebar"></i>
                                        <span style="font-size:15px;">Les évenements</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" class="list-anchor">
                                        <i class="icon-graduation icon-sidebar"></i>
                                        <span style="font-size:15px;">Portail mémoires</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('reclamation.index')}}" class="list-anchor">
                                        <i class="icon-exclamation icon-sidebar"></i>
                                        <span style="font-size:15px;">Déposer réclamation</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                   @endif
                    @endauth
                     @yield('content')

                </div>
            </div>

        </div>



        
        @yield('ee')


    </div>

    <!-- Scripts -->

    <script src="{{asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>-->
    <script src="{{ asset('assets/js/custom-file-input.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>



</body>

</html>