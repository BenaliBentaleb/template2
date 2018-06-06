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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">


    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>

    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="./index.html">
                            <img src="{{asset('assets/img/logo.svg')}}" class="header-brand-img" alt="tabler logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">

                            <div class="dropdown d-none d-md-flex">
                                <a class="nav-link icon" data-toggle="dropdown">
                                    <i class="fe fe-bell"></i>
                                    <span class="nav-unread"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item d-flex">
                                        <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                                        <div>
                                            <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                            <div class="small text-muted">10 minutes ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex">
                                        <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                                        <div>
                                            <strong>Alice</strong> started new task: Tabler UI design.
                                            <div class="small text-muted">1 hour ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex">
                                        <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                                        <div>
                                            <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                            <div class="small text-muted">2 hours ago</div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default">Bentaleb Youssouf</span>
                                        <small class="text-muted d-block mt-1">Administrateur</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-settings"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="float-right">
                                            <span class="badge badge-primary">6</span>
                                        </span>
                                        <i class="dropdown-icon fe fe-mail"></i> Inbox
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-send"></i> Message
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-log-out"></i> Sign out
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
                                        <i class="fe fe-home"></i> Acceuil</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.utilisateur')}}" class="nav-link">
                                        <i class="fe fe-users"></i> Utilisateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.departement')}}" class="nav-link">
                                        <i class="fe fe-box"></i> Départements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.formation')}}" class="nav-link ">
                                        <i class="fe fe-briefcase"></i> Formations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./publications.html" class="nav-link">
                                        <i class="fe fe-check-square"></i> Publications</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./evenements.html" class="nav-link">
                                        <i class="fe fe-calendar"></i> Événements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reclamation') }}" class="nav-link active">
                                        <i class="fe fe-alert-triangle"></i> Réclamations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.memoire') }}" class="nav-link">
                                        <i class="fe fe-book"></i> Mémoires</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.module') }}" class="nav-link ">
                                        <i class="fe fe-book-open"></i> Modules</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3 my-md-4">
                <div class="container">
                    @if(count($reclamations) == 0 )
                    <div class="col-md-12 mt-9 ">
                        <div class="col-md-6  mx-auto alert alert-icon alert-primary" role="alert">
                            <i class="fe fe-bell" aria-hidden="true"></i> Pas de mémoires partagés
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Réclamarions</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter users-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="w-1">Id</th>
                                            <th class="w-1"></th>
                                            <th>Nom</th>
                                            <th>Titre</th>
                                            <th>Contenu</th>
                                            <th>Etat</th>
                                            <th>Type</th>
                                            <th>Créer à</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reclamations as $r)
                                        <tr>
                                            <td>
                                                <span class="text-muted">{{$r->id}}</span>
                                            </td>
                                            <td>
                                                <span class="avatar" style="background-image: url({{asset($r->user->profile->photo_profile)}})"></span>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.profile',['id' => $r->user->id]) }}" class="text-inherit">{{$r->user->nom}}</a>
                                            </td>
                                            <td>
                                                {{str_limit($r->title,30)}}
                                            </td>
                                            <td>
                                                {{str_limit($r->reclamation,30)}}
                                            </td>
                                            <td>
                                                @if($r->status == 0)
                                                <span class="badge badge-warning">En attente</span>
                                                @elseif($r->status == 1)
                                                <span class="badge badge-success">Terminé</span>
                                                @elseif($r->status == 2)
                                                <span class="badge badge-danger">Rejeté</span>
                                                @endif




                                            </td>
                                            <td>
                                                {{ $r->Type }}
                                            </td>

                                            <td>
                                                {{$r->created_at->toFormattedDateString()}}
                                            </td>


                                            <td>
                                                @if($r->status == 0) {{-- Status == En attente --}}
                                                <a href="{{ route('admin.reclamation.repondre',['id' => $r->id]) }}" class="btn btn-secondary btn-sm">Répondre</a>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="item-action dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{ route('admin.reclamation.repondre',['id' => $r->id]) }}" class="dropdown-item">
                                                                    <i class="dropdown-icon fe fe-eye"></i> Voire réclamation </a>
                                                        <a href="{{ route('admin.reclamation.terminer',['id' => $r->id]) }}" class="dropdown-item">
                                                            <i class="dropdown-icon fe fe-check-circle"></i> Marquer comme terminé </a>
                                                        <a href="{{ route('admin.reclamation.rejeter',['id' => $r->id]) }}" class="dropdown-item">
                                                            <i class="dropdown-icon fe fe-alert-octagon"></i> Marquer comme rejeter </a>
                                                       

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <nav aria-label="Page navigation ">
                            <!-- <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>-->

                        </nav>
                        {{$reclamations->links('vendor.pagination.bootstrap-4')}}

                    </div>


                    @endif

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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
                        } else {
                            swal("votre donneé est protegé!");
                        }
                    });

            },
        };

        deleter.init();
    </script>
</body>

</html>