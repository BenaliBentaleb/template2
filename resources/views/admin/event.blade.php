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

    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/js/vendors/mixitup.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/core.js')}}"></script>



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
                                    <a href="{{route('admin.event')}}" class="nav-link active">
                                        <i class="fe fe-calendar"></i> Événements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.reclamation')}}" class="nav-link">
                                        <i class="fe fe-alert-triangle"></i> Réclamations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.memoire')}}" class="nav-link">
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
                        <h1 class="page-title ">Les événements partagées</h1>

                        <div class="ml-auto shuffle">
                            @if(count($events) > 0)
                            <span class="mr-5">Trier par :</span>
                            <button class="btn btn-secondary" type="button" data-mixitup-control data-filter="all">Tous</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".archive">Archive</button>
                            @endif
                            <a href="{{ route('admin.event.ajout') }}" class="btn btn-success ml-5">Ajouter événement</a>
                        </div>

                    </div>
                    <div class="row row-cards row-deck" id="events">
                        @if(count($events) == 0)
                        <div class="col-md-12 mb-4 ">
                            <div class="col-md-6 pb-6 mx-auto alert alert-icon alert-primary" role="alert">
                                <i class="fe fe-bell mr-2" aria-hidden="true"></i> Pas d'événements partagés
                            </div>
                        </div>
                        @else @foreach($events as $e)

                        <div class="col-lg-4 mix @if($e->is_archived == 1)  archive  @endif ">
                            <div class="card">
                                <div class="card-status
                                @if($e->is_archived ==1 )
                                bg-gray
                                @else
                                    @if($e->event_role == "Administrateur") 
                                    bg-admin 
                                    @elseif($e->event_role == "Enseignant")
                                    bg-prof
                                    @else
                                    bg-club
                                    @endif
                                @endif
                                "></div>
                                <div class="card-body d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4>
                                                <a href="#">{{ $e->titre }}</a>
                                            </h4>
                                        </div>
                                        <div class="col-md-2 " style="padding-right: 0;">
                                            <div class="item-action dropdown float-right">
                                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('admin.event.modifie',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-edit"></i> Modifier </a>
                                                    <a href="{{ route('admin.event.delete',['id' => $e->id] ) }}" id="delete-event" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-trash"></i> Supprimer </a>
                                                    <div class="dropdown-divider"></div>
                                                    @if($e->is_archived == "1")
                                                    <a href="{{ route('admin.event.unarchive',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-eye"></i> Désarchiver</a>
                                                    @else

                                                    <a href="{{ route('admin.event.archiver',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-eye-off"></i> Archiver</a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="text-muted">
                                        {{ str_limit($e->description,100) }}
                                    </div>
                                    <div class="mx-auto" style="height: 1px;background-color: #ccc;width: 80%;margin: 15px 0;"></div>
                                    <div>
                                        <span class="text-muted">Date début :</span>&nbsp;
                                        <span>{{ $e->debut }}</span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Date fin :</span>&nbsp;
                                        <span>{{ $e->fin }}</span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Formation :</span>&nbsp;
                                        @if($e->formation_id=='')
                                            <span>NTICien</span>
                                        @else
                                            <span>{{$e->formation->nom}}</span>
                                        @endif
                                    </div>

                                    @if($e->is_archived == 1)
                                    <div>
                                        <span class="badge bg-gray text-white">Événement archivé</span>&nbsp;
                                    </div>
                                    @endif
                                    <div class="mx-auto" style="height: 1px;background-color: #ccc;width: 80%;margin: 15px 0;"></div>
                                    <div>
                                        <span class="text-muted">Publier en tant que :</span>&nbsp;
                                        <span></span>
                                        @if($e->event_role == "Administrateur") Administrateur @elseif($e->event_role == "Enseignant") Enseignant @else Gérant club
                                        @endif
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="avatar avatar-md mr-3" style="background-image: url({{ asset($e->user->profile->photo_profile ) }})"></div>
                                        <div>
                                            <a href="{{ route('user.profile',['id' => $e->user_id ]) }}" class="text-default">{{ $e->user->nom . ' ' . $e->user->prenom }}</a>
                                            <div class="d-block">
                                                @foreach($e->user->roles as $role) @if($role->nom == "Administrateur")
                                                <li class="role-admin">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Enseignant")
                                                <li class="role-prof">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Gérant club")
                                                <li class="role-club">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Etudiant")
                                                <li class="role-etud">{{$role->nom}}</li>
                                                @endif @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach @endif

                    </div>
                    {{$events->links('vendor.pagination.bootstrap-4')}}

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
    <script type="text/javascript">
        
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

        $(document).ready(function () {
            var mixer = mixitup("#events", {
                selectors: {
                    control: '[data-mixitup-control]'
                }
            });

            $('.shuffle button').click(function () {
                $(this).addClass('selected').siblings().removeClass('selected');
            });

        });
    </script>
</body>
</html>