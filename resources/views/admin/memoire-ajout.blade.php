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

    <!--  <script src="./assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script> -->
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/mixitup.js')}}"></script>
    <script src="{{asset('assets/js/core.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                                    <a href="./reclamations.html" class="nav-link">
                                        <i class="fe fe-alert-triangle"></i> Réclamations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./memoires.html" class="nav-link">
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
            
             <div class="my-3 my-md-4">
                   
                <div class="container">
                    <div class="col-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter mémoire</h3>

                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.memoire.store')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <label class="form-label">Titre de mémoire<span class="form-required">*</span> </label>
                                        
                                        <input type="text" class="form-control" name="titre" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="row glutters-xs">
                                            <div class="col-md-6">
                                                <label class="form-label">Type <span class="form-required">*</span></label>
                                                
                                                <select id="memoiretype" name="type" class="form-control custom-select" required>
                                                    <option value="licence">Licence</option>
                                                    <option value="master">Master</option>

                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Spécialité <span class="form-required">*</span></label>
                                               
                                                <select id="memoireformation" name="formation_id" class="form-control custom-select" required>
                                                    @foreach($formations_licence as $formation)
                                                    <option value='{{$formation->id}}' >{{ $formation->nom }}</option>
                                                    @endforeach

                                                    @foreach($formations_master as $formation)
                                                    <option value='{{$formation->id}}'>{{ $formation->nom }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <div class="row glutters-xs">
                                            <div class="col-md-8">
                                                <label class="form-label">L'encadreur</label>
                                                <input type="text" class="form-control" name="encadreur" placeholder="Nom de l'encadreur">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Année <span class="form-required">*</span></label>
                                                <input name="date" class="form-control" type="text" required placeholder="Année" maxlength="4" minlength="4" pattern="[0-2][0-9][0-9][0-9]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            
                                        <label class="form-label">L'étudiant 1 <span class="form-required">*</span></label>
                                        <input type="text" class="form-control" name="etudiant1" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">L'étudiant 2</label>
                                        <input type="text" class="form-control" name="etudiant2">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">L'étudiant 3</label>
                                        <input type="text" class="form-control" name="etudiant3">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">L'étudiant 4</label>
                                        <input type="text" class="form-control" name="etudiant4">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Uploader un fichier <span class="form-required">*</span></div>
                                       
                                            <input type="file" class="btn btn-secondary btn-block"  name="fichier" accept=".pdf" required>
                                            {{-- <label class="custom-file-label">Choose file</label> --}}
                                        
                                    </div>

                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <button type="submit" class="btn btn-primary">Sauvgarder</button>
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
    <script type="text/javascript">
        (function (document, window, index) {
            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function (input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function (e) {
                    var fileName = '';
                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace(
                            '{count}', this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        label.querySelector('span').innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });

                // Firefox bug fix
                input.addEventListener('focus', function () {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function () {
                    input.classList.remove('has-focus');
                });
            });
        }(document, window, 0));
    </script>


    <script type="text/javascript">
        var licence = "";
        @foreach($formations_licence as $formation)
        licence += "<option value='{{$formation->id}}'>{{ $formation->nom }}</option>";
        @endforeach
        var master = "";
        @foreach($formations_master as $formation)
        master = master + "<option value='{{$formation->id}}'>{{ $formation->nom }}</option>";
        @endforeach
        console.log(licence);
        console.log(master);
        $("#memoiretype").click(function () {
            var val = $(this).val();
            if (val == "licence") {
                $("#memoireformation").html(

                    licence
                );


            } else if (val == "master") {
                $("#memoireformation").html(

                    master
                );

            }
        });
    </script>

</body>

</html>