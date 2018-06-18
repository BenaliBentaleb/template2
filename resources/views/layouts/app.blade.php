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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    
    <link rel="stylesheet" href="{{asset('assets/css/Navigation-Clean.css')}}">
  

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="{{asset('assets/js/jquery.min.js') }}"></script>
  
    <style>
        .chat {
          list-style: none;
          margin: 0;
          padding: 0;
        }
      
        .chat li {
          margin-bottom: 10px;
          padding-bottom: 5px;
          border-bottom: 1px dotted #B3A9A9;
        }
      
        .chat li .chat-body p {
          margin: 0;
          color: #777777;
        }
      
        .panel-body {
          overflow-y: scroll;
          height: 350px;
        }
      
        ::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
          background-color: #F5F5F5;
        }
      
        ::-webkit-scrollbar {
          width: 12px;
          background-color: #F5F5F5;
        }
      
        ::-webkit-scrollbar-thumb {
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
          background-color: #555;
        }
      </style>
    
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
                    
                    {{-- <form class="navbar-form navbar-left" target="_self">
                        <div class="form-group">
                            <label class="control-label" for="search-field">
                                <i class="glyphicon glyphicon-search"></i>
                            </label>
                            <input class="form-control search-field" type="search" name="search" id="search-field">
                        </div>
                    </form> --}}
                    
                   
                    

                    @guest

                    <a class="navbar-link navbar-right" href="{{ route('login') }}">S'authentifier</a>
                    <a class="navbar-link navbar-right inscrire-btn" href="{{ route('register') }}">S'inscrire</a>

                    @else


                    <ul class="nav navbar-nav navbar-right">
                            @auth
                            <li>
                                <a href="/chat" class="btn btn-default navbar-btn chat-btn" >
                                    <i class="icon-bubbles"></i>
                                </a>
                            </li>
                            <li><notification   :id_auth="{{ Auth::id() }}" ></notification> </li> 
                           <unreadnot></unreadnot>
                            @if(Auth::user()->isAdmin())
                            <unreadnotadmin></unreadnotadmin>
                            <li>
                                <a href="{{route('admin.index')}}" class="btn btn-default navbar-btn admin-btn" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                                    <i class="fe fe-settings"></i>
                                </a>
                            </li>
                            @endif
                        
                           
                            <audio  id="noty">
                                <source src="{{ asset('notification/definite.mp3') }}" type="">
                            </audio>
                        @endauth
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



        @yield('chat')
        <div style="margin-top:20px;">

            @if($chat == null)
            <div class="container" style="margin-top:97px;">
                    <div class="row">
                        @auth
                       @if($profile == null)


                        <div class="col-md-3">
                                <ul class="list-group side-bar">
                                    <li class="list-group-item" style="padding-top:10px;">
                                        <a href="{{route('home')}}" class="list-anchor {{ Request::is('home') ? 'active' : '' }}" >
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
                                        <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor  {{ Request::is("formation/$formation->nom") ? 'active' : '' }}">
                                            <span class="l1-circle">{{ substr($formation->nom,0,2) }}</span>
                                            <span>{{$formation->nom}}</span>
                                        </a>
                                    </li>
                                    @endif @if(str_contains($formation->nom,'Licence'))
                                    <li class="list-group-item">
                                        <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-l3 {{ Request::is("formation/$formation->nom") ? 'active' : '' }}">
                                            <span class="licence-circle">L3</span>
                                            <span>{{$formation->nom}}</span>
                                        </a>
                                    </li>
                                    @endif @if(str_contains($formation->nom,'Master 1'))
                                    <li class="list-group-item">
                                        <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master1 {{ Request::is("formation/$formation->nom") ? 'active' : '' }}">
                                            <span class="master1-circle">M1</span>
                                            <span>{{$formation->nom}}</span>
                                        </a>
                                    </li>
                                    @endif @if(str_contains($formation->nom,'Master 2'))
                                    <li class="list-group-item">
                                        <a href="{{route('formation',['id'=>$formation->nom])}}" class="list-anchor list-anchor-master2 {{ Request::is("formation/$formation->nom") ? 'active' : '' }}" >
                                            <span class="master2-circle">M2</span>
                                            <span>{{$formation->nom}}</span>
                                        </a>
                                    </li>
                                    @endif @endforeach @endforeach


                                    <li class="list-group-item border-top">
                                        <a href="{{route('evenement')}}" class="list-anchor {{ Request::is('evenement/*') ? 'active' : '' }} {{ Request::is('evenement') ? 'active' : '' }}" >
                                            <i class="icon-bell icon-sidebar"></i>
                                            <span style="font-size:15px;">Les évenements</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{route('portail.memoire')}}" class="list-anchor  {{ Request::is('portail/memoire') ? 'active' : '' }}
                                        {{ Request::is('memoire/*') ? 'active' : '' }}">
                                            <i class="icon-graduation icon-sidebar"></i>
                                            <span style="font-size:15px;">Portail mémoires</span>
                                        </a>
                                    </li>

                                    @foreach(Auth::user()->roles as $role)
                                        @if($role->nom == "Administrateur" || $role->nom == "Enseignant"  )
                                            @break
                                        @endif
                                        <li class="list-group-item">
                                            <a href="{{route('reclamation.index')}}" class="list-anchor {{ Request::is('reclamation') ? 'active' : '' }} {{ Request::is('reclamation/*') ? 'active' : '' }}">
                                                <i class="icon-exclamation icon-sidebar"></i>
                                                <span style="font-size:15px;">Déposer une réclamation</span>
                                            </a>
                                        </li>
                                        @break
                                    @endforeach
                                </ul>
                            </div>
                       @endif
                        @endauth
                         @yield('content')

                    </div>
                </div>
            @endif

        </div>


    </div>

    <!-- Scripts -->


    

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>-->
    <script src="{{ asset('assets/js/custom-file-input.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="{{asset('assets/js/custom-file-input.js')}}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('assets/js/mixitup-multifilter.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script type="text/javascript">

          $('#profile-picture').change(function() {
    $('#profile-picture-form').submit();
  });
  
  $('#cover').change(function() {
    $('#cover-form').submit();
  });

     $("#add-choix").click(function () {
      if($(".sondage-form input").length <5) {
        input = jQuery('<li><label class="form-label">Choix ' + ($(".sondage-form input").length + 1) + ':</label><input class="form-control" type="text" name="choix' +($(".sondage-form input").length + 1) + '"></li>');
      jQuery('.sondage-form').append(input);
      input.hide().show('slow');
      }else {
        $("#add-choix").hide('slow');
      }
    });
       
  $("select[name='type']").change(function(){
      var type = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{route('getformation.memoire',['type'=>"+type+"])}}",
          method: 'GET',
          data: {type:type, _token:token},
          success: function(data) {
            let option ="";
          for (const id of data) {
              console.log(id.nom);
              
                    $("select[name='formation_id']").html(
                        (option += "<option  value='" + id.id + "'>" + id.nom + "</option>")
                );
          }
        
          }
      });
  });

    $('body').on('click', '#submitForm', function(){
        var registerForm = $("#Register");
        var formData = registerForm.serialize();
        $( '#name-error' ).html( "" );
        $( '#email-error' ).html( "" );
        $( '#formation-error' ).html( "" );
        $( '#date_naissance-error' ).html( "" );
        $( '#addresse-error' ).html( "" );
        $( '#numero_telephone-error' ).html( "" );
        $( '#informations-error' ).html( "" );
        var id = $(this).data('id');
        $.ajax({
            url:'/user/profile/modifier/'+id,
            type:'POST',
            data:formData,
            success:function(data) {
                //console.log(data.errors.addresse[0]);
                if(data.errors) {
                    
                    if(data.errors.addresse){
                        $( '#addresse-error' ).text( data.errors.addresse[0] );
                    }
                    if(data.errors.date_naissance){
                        $( '#date_naissance-error' ).html( data.errors.date_naissance[0] );
                    }
                    if(data.errors.numero_telephone){
                        $( '#numero_telephone-error' ).html( data.errors.numero_telephone[0] );
                    }
                    if(data.errors.formation){
                        $( '#formation-error' ).html( data.errors.formation[0] );
                    }
                    if(data.errors.informations){
                        $( '#informations-error' ).html( data.errors.informations[0] );
                    }

                    if(data.errors.facebook){
                        $( '#facebook-error' ).html( data.errors.facebook[0] );
                    }
                    if(data.errors.instagram){
                        $( '#instagram-error' ).html( data.errors.instagram[0] );
                    }
                    if(data.errors.youtube){
                        $( '#youtube-error' ).html( data.errors.youtube[0] );
                    }
                    if(data.errors.twitter){
                        $( '#twitter-error' ).html( data.errors.twitter[0] );
                    }

                    console.log(data.errors);
                }
              if(data.success) {
                  //  $('#success-msg').removeClass('hide');
                        $('#modifierprofile').modal('hide');
                       // $('#success-msg').addClass('hide');
                       window.location.href = "http://127.0.0.1:8000/profile/"+id;
                }
            },
        });
    });
    /*    $('body').on('click', '#submitsondageform', function(e){
            e.preventDefault();
        var registerForm = $("#sondage-form");
        var formData = registerForm.serialize();
        console.log(formData);
     
        
        $.ajax({
            url:'/sondage/store',
            type:'POST',
            data:formData,
            success:function(data) {
                //console.log(data.errors.addresse[0]);
                if(data.errors) {
                  
                    console.log(data.errors);
                }
              if(data.success) {
            
                console.log(data.errors);
                }
            },
        });
    });*/
  /*$(function () {
                        //$('.sondage-resultat').hide();
                        $("#show-result").click(function (e) {
                            //e.preventDefault();
                            //$('.sondage-result').replaceWith('Hellooo');
                            $('#sondage-options').hide(600);
                            //$('#show-result').hide(600);
                            $('#sondage-result').show(600);
                            
                        });
                    });*/
        var signaler = {
            linkSelector: "a#signaler-btn",
            init: function () {
                $(this.linkSelector).on('click', {
                    self: this
                }, this.handleClick);
            },
            handleClick: function (event) {
                event.preventDefault();
                var self = event.data.self;
                var link = $(this);
                swal({
                        title: "Etes-Vous sur ?",
                        text: "Apres la signaler, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                          /*  swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });*/ window.location = link.attr('href');
                        }/* else {
                            swal("votre donneé est protegé!");
                        }*/
                    });
            },
        };
        signaler.init();
     var supprimer = {
        linkSelector: "a#supprimer-btn",
        init: function () {
            $(this.linkSelector).on('click', {
                self: this
            }, this.handleClick);
        },
        handleClick: function (event) {
            event.preventDefault();
            var self = event.data.self;
            var link = $(this);
            swal({
                    title: "Etes-Vous sur ?",
                    text: "L'évenement sera supprimé définitivement",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    /*  swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });*/ window.location = link.attr('href');
                    }/* else {
                        swal("votre donneé est protegé!");
                    }*/
                });
        },
        };
        supprimer.init();

        var memoire_supprimer = {
        linkSelector: "a#delete-memoire",
        init: function () {
            $(this.linkSelector).on('click', {
                self: this
            }, this.handleClick);
        },
        handleClick: function (event) {
            event.preventDefault();
            var self = event.data.self;
            var link = $(this);
            swal({
                    title: "Etes-Vous sur ?",
                    text: "Le mémoire sera supprimé définitivement",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    /*  swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });*/ window.location = link.attr('href');
                    }/* else {
                        swal("votre donneé est protegé!");
                    }*/
                });
        },
        };
        memoire_supprimer.init();

</script>


</body>


</html>