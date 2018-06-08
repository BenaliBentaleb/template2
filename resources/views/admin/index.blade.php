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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />


    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>

    <script src="{{asset('assets/js/vendors/mixitup.js')}}"></script>
    <script src="{{asset('assets/js/publications.js')}}"></script>
    <!--   <script src="{{asset('assets/js/dashboard.js')}}"></script>-->
    <script src="{{asset('assets/js/core.js')}}"></script>
    <!-- include summernote css/js -->

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
                                    <span class="avatar" style="background-image: url({{Auth::user()->profile->photo_profile}})"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default">{{Auth::user()->nom}} {{Auth::user()->prenom}}</span>
                                        <small class="text-muted d-block mt-1">Administrateurr</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('user.profile',['id'=>Auth::id()]) }}">
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
                                    <a class="" href="{{ route('logout') }}">
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
                        <div class="col-lg-2 ml-auto">
                            <form class="input-icon my-3 my-lg-0">
                                <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                                <div class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item">
                                    <a href="{{route('admin.index')}}" class="nav-link active">
                                        <i class="fe fe-home"></i> Home</a>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @yield('admin')
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





            var mixer = mixitup("#memoires", {
                selectors: {
                    control: '[data-mixitup-control]'
                }
            });

            $('.shuffle button').click(function () {
                $(this).addClass('selected').siblings().removeClass('selected');
            });

        });
        /*   var notification = Vue.component('notification', {
               data: function () {
                   return {
                       count: 0
                   }
               },
               template: ` <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> <
                   a href = "#"
               class = "dropdown-item d-flex" >
               <
               span class = "avatar mr-3 align-self-center"
               style = "background-image: url(demo/faces/male/41.jpg)" > < /span> <
               div >
               <
               strong > Nathan < /strong> pushed new commit: Fix page load performance issue. <
               div class = "small text-muted" > 10 minutes ago < /div> <
               /div> <
               /a> <
               a href = "#"
               class = "dropdown-item d-flex" >
               <
               span class = "avatar mr-3 align-self-center"
               style = "background-image: url(demo/faces/female/1.jpg)" > < /span> <
               div >
               <
               strong > Alice < /strong> started new task: Tabler UI design. <
               div class = "small text-muted" > 1 hour ago < /div> <
               /div> <
               /a> <
               a href = "#"
               class = "dropdown-item d-flex" >
               <
               span class = "avatar mr-3 align-self-center"
               style = "background-image: url(demo/faces/female/18.jpg)" > < /span> <
               div >
               <
               strong > Rose < /strong> deployed new version of NodeJS REST Api V3 <
               div class = "small text-muted" > 2 hours ago < /div> <
               /div> <
               /a> <
               div class = "dropdown-divider" > < /div> <
               a href = "#"
               class = "dropdown-item text-center text-muted-dark" > Mark all as read < /a>
               </div>`,
           })

           new Vue({
               el: '#app1',

               components: {
                   notification: notification
               },

               data: {
                   message: 'djamel',
                   mounted() {
                       this.get_unread();
                   },
                   computed: {
                       all_nots_count() {
                           return this.$store.getters.all_nots_count;
                       },
                       all_not() {
                           return this.$store.getters.all_nots;
                       }
                   },
                   methods: {
                       get_unread() {




                           axios.get("/get_unreadnot").then(response => {
                               //   console.log(response);

                               response.data.forEach(not => {
                                   //  console.log(not);
                                   //  console.log(not.data);
                                   let notification = {
                                       id: not.id,
                                       message: not.data.message,
                                       nom: not.data.nom,
                                       profile: not.data.profile,
                                       type: not.type
                                   }
                                   // console.log(notification)
                                   this.$store.commit("add_not", notification);
                               });
                           });
                       }
                   }

               },
               created() {


               }
           });*/
    </script>


</body>

</html>