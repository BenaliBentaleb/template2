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
            <div class="container d-flex justify-content-center mt-5">
                <div class="col-md-9 ">
                    <form action="{{ route('admin.event.store') }}" method="POST">
                            {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ajout un évènement</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-8 form-group">
                                        <label>Titre de l'évenement</label>
                                        <input type="text" name="titre" required class="form-control" placeholder="Titre ..">

                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Publier en tant que</label>
                                        <select class="form-control" required name="event_role" style="margin-right:0;">
                                            @foreach(Auth::user()->roles as $role) 
                                                @if($role->nom == "Administrateur")
                                                    <option value="Administrateur" >{{$role->nom}} </option>
                                                @elseif($role->nom == "Enseignant")
                                                    <option value="Enseignant" >{{$role->nom}} </option>
                                                @elseif($role->nom == "Gérant club")
                                                    <option value="Gérant club" >{{$role->nom}} </option>
                                                @endif 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group ">
                                        <label class="form-label">Date debut</label>
                                        <input type="date" name="debut"  class="form-control" required>
                                    </div>

                                    <div class="col-md-4 form-group ">
                                        <label class="form-label">Date fin</label>
                                        <input type="date" name="fin" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-label">Formation</label>
                                        <select name="formation_id" class="form-control custom-select" required>
                                            <optgroup label="NTICien">
                                                <option value="" selected >Général - NTICien</option>
                                            </optgroup>
                                            @foreach($departements as $departement)
                                                <optgroup label="Déprartement : {{ $departement->nom }}">
                                                    @foreach($departement->formation as $formation)
                                                        <option value="{{ $formation->id }}" >{{ $formation->nom }}</option>
                                                    @endforeach                                            
                                                </optgroup>
                                            @endforeach
                                        </select>      
                                    </div>
                                    <div class=" col-md-12 form-group">
                                        <label class="form-label">Brève description
                                            <span class="form-label-small">
                                                <span id="short-content-size">0</span>/150</span>
                                        </label>
                                        <textarea id="short-content" onkeyup="countChar(this)" required class="form-control" name="description" rows="3" placeholder="Content.."
                                            maxlength="150"></textarea>

                                        <script type="text/javascript">
                                            function countChar(val) {
                                                var len = val.value.length;
                                                if (len >= 150) {
                                                    val.value = val.value.substring(0, 150);
                                                } else {
                                                    $('#short-content-size').text(150 - len);
                                                }
                                            };
                                        </script>

                                    </div>
                                    <div class=" col-md-12 form-group">
                                        <label class="form-label">Description de l'évenement
                                            <span class="form-label-small"></span>
                                        </label>
                                        <textarea id="event-content" name="contenu"></textarea>

                                        <!-- Event content here! -->

                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {

                                            // initialize summernote
                                            $('#event-content').summernote({
                                                height: 100
                                            });
                                            // and set code
                                            $('#event-content').summernote('code', contents);
                                        });
                                    </script>
                                </div>


                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <input type="submit" class="btn btn-primary" value="Sauvgarder">
                                    <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                                </div>
                            </div>
                    </form>

                    </div>

                </div>
            </div>
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
    // initialize summernote
             $('#summernote').summernote({
                height: 300
            });
            // and set code
            $('#summernote').summernote('code', contents);


});
function dateCompare(date1, date2){
    return new Date(date2) > new Date(date1);
}
</script>
</body>
</html>