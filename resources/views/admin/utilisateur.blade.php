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

    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />

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
                                    <a href="{{route('admin.utilisateur')}}" class="nav-link active">
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
                                    <a href="{{route('admin.event')}}" class="nav-link">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Utilisateurs</h3>

                                <a href="{{route('admin.form.ajouter.utilisateur')}}" class="btn btn-azure ml-auto">Ajouter utilisateur</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter users-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="w-1">Id</th>
                                            <th class="w-1"></th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Créer à</th>
                                            <th>Rôles</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <span class="text-muted">{{$user->id}}</span>
                                            </td>
                                            <td>
                                                <span class="avatar" style="background-image: url({{asset($user->profile->photo_profile)}})"></span>
                                            </td>
                                            <td>
                                                <a href="{{route('user.profile',['id'=>$user->id])}}" class="text-inherit">{{$user->nom}}</a>
                                            </td>
                                            <td>
                                                {{$user->prenom}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->created_at->toFormattedDateString()}}
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role) @if($role->nom =="Administrateur")
                                                <span class="role-admin">Administrateur</span>
                                                @endif @if($role->nom =="Enseignant")
                                                <span class="role-prof">Enseignant</span>
                                                @endif @if($role->nom =="Gerant Club")
                                                <span class="role-club">Gérant Club</span>
                                                @endif @if($role->nom =="Etudiant")
                                                <span class="role-etudiant">Etudiant</span>
                                                @endif @endforeach
                                            </td>

                                            <td class="w-0">
                                                <a class="icon" href="{{route('user.profile',['id'=>$user->id])}}" title="" data-toggle="tooltip" data-original-title="Profil">
                                                    <i class="fe fe-user"></i>
                                                </a>
                                            </td>
                                            <td class="w-0">
                                                <a class="icon" href="{{route('admin.form.modifier.utilisateur',['id'=>$user->id])}}" title="" data-toggle="tooltip" data-original-title="Modifier">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            </td>
                                            <td class="w-0">
                                                @if($user->id != Auth::id())
                                                <a class="icon" id="delete-user" href="{{route('admin.utilisateur.delete',['id'=>$user->id])}}" title="" data-toggle="tooltip" data-original-title="Supprimer">
                                                    <i class="fe fe-trash text-danger" id="delete"></i>
                                                </a>
                                                @endif

                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        {{$users->links('vendor.pagination.bootstrap-4')}}

                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
    <script type="text/javascript">
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



        var deleter = {

            linkSelector: "a#delete-user",

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
                        text: "Apres la suppression, TOUS les informations relative à cet utilisateur seront supprimé !",
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


    </script>


</body>

</html>