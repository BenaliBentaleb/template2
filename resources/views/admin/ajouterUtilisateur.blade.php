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
            <div class="container d-flex justify-content-center mt-5">
                <div class="col-md-6 ">
                    <form  action="{{route('admin.ajouter.utilisateur')}}" method="POST" class="card">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h3 class="card-title">Ajouter utilisateur</h3>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}"   required>
                                @if ($errors->has('nom'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prenom</label>
                                <input type="text" class="form-control" name="prenom" required  value="{{ old('prenom') }}">
                                @if ($errors->has('prenom'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirmer mot de passe</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Rôles </div>
                                <div>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="Administrateur" value="Administrateur">
                                        <span class="custom-control-label">Administrateur</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ens" type="checkbox"  class="custom-control-input " name="Enseignant" value="Enseignant" onClick="uncheck(1);">
                                        <span class="custom-control-label">Enseignant</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="etud" type="checkbox" class="custom-control-input " name="Etudiant" value="Etudiant" onClick="uncheck(2);">
                                        <span class="custom-control-label">Étudiant</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="Gérant-club" value="Gérant club">
                                        <span class="custom-control-label">Gérant club</span>
                                    </label>
                                    
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="btn-list text-right">
                                <button type="submit"  class="btn btn-primary">Sauvgarder</button>
                                <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                            </div>
                        </div>
                    </form>
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

    </script>
</body>

</html>