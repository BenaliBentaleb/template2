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

    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet"/>
   
    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/core.js')}}"></script>
   
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script src="{{asset('assets/js/vendors/mixitup.js')}}"></script>



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
                                    <a href="{{route('admin.reclamation')}}" class="nav-link">
                                        <i class="fe fe-alert-triangle"></i> Réclamations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.memoire')}}" class="nav-link active">
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

                    <div class="page-header">
                        <h1 class="page-title ">
                            Les mémoires partagés
                        </h1>
                        @if(count($memoires) != 0)
                        <div class="ml-auto shuffle">
                            <button class="btn btn-secondary mixitup-control-active" type="button" data-mixitup-control="" data-filter="all">Tous</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control="" data-filter=".licence">Licence</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control="" data-filter=".master">Master</button>
                        </div>
                        @endif
                        <a href="{{ route('admin.memoire.ajout')}}" class=" @if(count($memoires) == 0) ml-auto @endif btn btn-success ml-5">Ajouter memoire</a>
                    </div>

                    <div class="row row-cards row-deck " id="memoires">
                        @if(count($memoires) == 0)
                        <div class="col-md-12 mb-4 ">
                            <div class="col-md-6 pb-6 mx-auto alert alert-icon alert-primary" role="alert">
                                <i class="fe fe-bell mr-2" aria-hidden="true"></i> Pas de mémoires partagés
                            </div>
                        </div>
                        @else @foreach($memoires as $memoire)
                        <div class="col-lg-4 mix @if($memoire->type == 'licence') licence @else master @endif">
                            <div class="card">
                                <div class="card-status card-status-left @if($memoire->type == 'licence') bg-licence @else bg-master @endif "></div>
                                <div class="card-body d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4>
                                                {{ $memoire->titre }}
                                            </h4>
                                            <h6> 
                                                Memoire de  {{ $memoire->formation->nom}} - {{ $memoire->date }}
                                            </h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card-options">

                                                <a class="icon" href="{{ route('admin.memoire.modifie',['id' => $memoire->id ])}}" title="" data-toggle="tooltip" data-original-title="Modifier">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a class="icon" id="delete-memoire" href="{{ route('admin.memoire.delete',['id' => $memoire->id ]) }}" title="" data-toggle="tooltip" data-original-title="Supprimer">
                                                    <i class="fe fe-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <span>
                                        <b>Réaliser par :</b>
                                    </span>
                                    <div>
                                        <ul>
                                            @if($memoire->etudiant1)
                                            <li>
                                                {{ $memoire->etudiant1}}
                                            </li>
                                            @endif @if($memoire->etudiant2)
                                            <li>
                                                {{ $memoire->etudiant2}}
                                            </li>
                                            @endif @if($memoire->etudiant3)
                                            <li>
                                                {{ $memoire->etudiant3}}
                                            </li>
                                            @endif @if($memoire->etudiant4)
                                            <li>
                                                {{ $memoire->etudiant4}}
                                            </li>
                                            @endif

                                        </ul>
                                        @if($memoire->encadreur)
                                        <span class="d-block">
                                            <b>Encadrer par :</b>
                                        </span>
                                        <span> {{ $memoire->encadreur }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="avatar avatar-md mr-3" style="background-image: url({{ asset($memoire->user->profile->photo_profile)}})"></div>
                                        <div>
                                            <a href="./profile.html" class="text-default">{{ $memoire->user->nom . " " .$memoire->user->prenom }}</a>
                                            <small class="d-block text-muted">{{ $memoire->created_at->diffForHumans()}}</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach @endif



                    </div>

                    {{$memoires->links('vendor.pagination.bootstrap-4')}}

                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    var mixer = mixitup("#memoires", {
                selectors: {
                    control: '[data-mixitup-control]'
                }
            });

            $('.shuffle button').click(function () {
                $(this).addClass('selected').siblings().removeClass('selected');
            });
            
        function uncheck(check) {
            var ens = document.getElementById("ens");
            var etud = document.getElementById("etud");
            if (ens.checked == true && etud.checked == true) {
                if (check == 2) {
                    ens.checked = false;
                    checkRefresh();
                } else if (check == 1) {
                    etud.checked = false;
                    checkRefresh();
                }
            }
        }

        function checkRefresh(value) {
            document.form1.submit();
        }

 var deleterEvent = {
            linkSelector: "a#delete-event",
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
                        text: "Cet évènement sera supprimé d'une manière définitive",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*  swal("Poof! Your imaginary file has been deleted!", {
                                  icon: "success",
                              });*/
                            window.location = link.attr('href');
                        } 
                    });
            },
        };
        deleterEvent.init();




        var deleter = {

            linkSelector: "a#delete-btn",

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
                        text: "Apres la suppression, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*  swal("Poof! Your imaginary file has been deleted!", {
                                  icon: "success",
                              });*/
                            window.location = link.attr('href');
                        }
                    });

            },
        };

        deleter.init();

        var deleterSignalePublication = {

            linkSelector: "a#delete-signaler-publication",

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
                        text: "Apres la suppression, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*  swal("Poof! Your imaginary file has been deleted!", {
                                  icon: "success",
                              });*/
                            window.location = link.attr('href');
                        }
                    });

            },
        };

        deleterSignalePublication.init();


        var deleterPublication = {

            linkSelector: "a#delete-publication",

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
                        text: "Apres la suppression, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*  swal("Poof! Your imaginary file has been deleted!", {
                                  icon: "success",
                              });*/
                            window.location = link.attr('href');
                        }
                    });

            },
        };

        deleterPublication.init();


        var deleterMemoire = {

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
                        text: "Apres la suppression, le mémoire sera supprimé définitivement !",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*  swal("Poof! Your imaginary file has been deleted!", {
                                  icon: "success",
                              });*/
                            window.location = link.attr('href');
                        } 
                    });

            },
        };

        deleterMemoire.init();


        $(document).ready(function () {

            // initialize summernote
            $('#summernote').summernote({
                height: 300
            });
            // and set code
            $('#summernote').summernote('code', contents);





            

        });
       
    </script>


</body>

</html>