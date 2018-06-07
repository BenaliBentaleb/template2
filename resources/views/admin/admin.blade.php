
@extends('admin.index') @section('admin')

    
<<<<<<< HEAD
=======
    <script src="{{asset('assets/js/core.js')}}"></script>
    <script src="{{asset('assets/js/summernote-bs4.min.js')}}"></script>

</head>

<body class="">
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
                  <span class="avatar" style="background-image: url({{ asset(Auth::user()->profile->photo_profile)}})"></span>
                  <span class="ml-2 d-none d-lg-block">
                    <span class="text-default">{{ Auth::user()->nom . ' ' . Auth::user()->prenom }}</span>
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
                            <a href="{{ route('admin.reclamation') }}" class="nav-link">
                                <i class="fe fe-alert-triangle"></i> Réclamations</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.memoire') }}" class="nav-link">
                                <i class="fe fe-book"></i> Mémoires</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.module') }}" class="nav-link active">
                                <i class="fe fe-book-open"></i> Modules</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 9a6ff1e456b9b54e6915787ce4ba13cfe8a87724
      <div class="my-3 my-md-5">
        <div class="container">
          <div class="page-header">
            <h1 class="page-title">
              Bienvenue dans le panneau de contrôle - NTICien !
            </h1>
          </div>
          <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <div class="card-status card-status-left bg-blue"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$users}}</div>
                  <div class="text-muted mb-4">Utilisateurs</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-orange"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$status}}</div>
                  <div class="text-muted mb-4">Status</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-lime"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$Tutorial}}</div>
                  <div class="text-muted mb-4">Tutoriels</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-blue"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$FAQ}}</div>
                  <div class="text-muted mb-4">FAQs</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-indigo"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$sondage}} </div>
                  <div class="text-muted mb-4">Sondages</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-teal"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$memoire}}</div>
                  <div class="text-muted mb-4">Mémoires</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-red"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$reclamation}}</div>
                  <div class="text-muted mb-4">Réclamations</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-azure"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$evenement}}</div>
                  <div class="text-muted mb-4">Événements</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-gray-dark"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$departement}}</div>
                  <div class="text-muted mb-4">Départements</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-pink"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$formation}}</div>
                  <div class="text-muted mb-4">Formations</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                  <div class="card-status card-status-left bg-orange"></div>
                <div class="card-body p-5 text-center">
                  <div class="h1 m-0">{{$module}}</div>
                  <div class="text-muted mb-4">Modules</div>
                </div>
              </div>
            </div>

          </div>


        </div>
      </div>
    </div>

   
  </div>

@endsection