@extends('layouts.app') @section('content')





<div class="col-md-6">
    <div class="share-zone">


        <div>
            <ul class="nav nav-tabs">
                <li>
                    <a href="#tab-1" role="tab" data-toggle="tab">
                        <i class="icon-speech icon"></i>Status</a>
                </li>
                <li>
                    <a href="#tab-2" role="tab" data-toggle="tab">
                        <i class="icon-doc icon"></i>Tutorial</a>
                </li>
                <li>
                    <a href="#tab-3" role="tab" data-toggle="tab">
                        <i class="icon-question icon-sidebar"></i>FAQ</a>
                </li>
                <li class="active">
                    <a href="#tab-4" role="tab" data-toggle="tab">
                        <i class="icon-list icon"></i>Sondage</a>
                </li>
            </ul>
            <div class="tab-content ">
                <div class="tab-pane " role="tabpanel" id="tab-1">

                    <form action="{{route('status.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="border-bottom">
                            <span class="status-title">Titre :&nbsp;</span>

                            <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                            <select class="module-options" name="status_module" style="margin-right:0;">
                                <option value="general">General</option>


                            </select>


                        </div>



                        <textarea class="form-control content" name="status" id="summernote-status" required></textarea>
                        <div style="padding-top:0;padding-bottom:11px;">
                            <input type="file" name="file" multiple="" id="file_status" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                            <div class="box" style="margin-left:10px;display:  inline-block;">
                                <input type="file" name="files[]" id="file-status" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                    multiple="">
                                <label for="file-status" style="border: 1px solid #448ccb; ">
                                    <span></span>
                                    <strong style="font-weight:400;">Choose a file…</strong>
                                </label>
                            </div>
                            <button class="btn btn-default" type="submit" id="publier-status">Publier</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane" role="tabpanel" id="tab-2">

                    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="border-bottom">
                            <span class="status-title">Titre :&nbsp;</span>

                            <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>


                            <select class="module-options" name="status_module" style="margin-right:0;">



                                <option value="general">General</option>



                            </select>


                        </div>

                        <textarea class="form-control content" name="blog" id="summernote-blog" required></textarea>
                        <div style="padding-top:0;padding-bottom:11px;">
                        <input type="file" name="file" multiple="" id="file_blog" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                        <div class="box" style="margin-left:10px;display:  inline-block;">
                            <input type="file" name="files[]" id="file-blog" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                multiple="">
                            <label for="file-blog" style="border: 1px solid #448ccb; ">
                                <span></span>
                                <strong style="font-weight:400;">Choose a file…</strong>
                            </label>
                        </div>
                        <button class="btn btn-default" type="submit" id="publier-status">Publier</button>
                        <input type="hidden" name="type" value="Tutorial">
                        
                        </div>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-3">

                    <form action="{{route('faq.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="border-bottom">
                            <span class="status-title">Titre :&nbsp;</span>

                            <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                            <select class="module-options" name="faq_module" style="margin-right:0;">

                                <option value="general">General</option>
                            </select>


                        </div>

                        <textarea class="form-control content" name="faq" id="summernote-faq" required></textarea>
                        <div style="padding-top:0;padding-bottom:11px;">
                            <input type="file" name="file" multiple="" id="file_faq" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                            <div class="box" style="margin-left:10px;display:  inline-block;">
                                <input type="file" name="files[]" id="file-faq" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                    multiple="">
                                <label for="file-faq" style="border: 1px solid #448ccb; ">
                                    <span></span>
                                    <strong style="font-weight:400;">Choose a file…</strong>
                                </label>
                            </div>
                            <button class="btn btn-default" type="submit" id="publier-status">Publier</button>
                        </div>
                    </form>
                </div>

                <!-- sondage-->
                <div class="tab-pane active " role="tabpanel" id="tab-4">

                    <form id="sondage-form" action="{{route('sondagechoix.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="border-bottom">
                            <span class="status-title">Titre :&nbsp;</span>

                            <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                            <select class="module-options" name="sondage_module" style="margin-right:0;">

                                <option value="general">General</option>

                            </select>


                        </div>

                        <textarea class="form-control content" name="sondage" id="summernote-sondage" required></textarea>
                        <div style="padding-top:0;padding-bottom:11px;">
                            <div class="sondage-list">
                                <ul class="sondage-form form-group  list-unstyled">
                                    <li>
                                        <label class="form-label">Choix 1 :</label>
                                        <input class="form-control" type="text" name="choix1">
                                    </li>
                                    <li>
                                        <label class="form-label">Choix 2 :</label>
                                        <input class="form-control" type="text" name="choix2">
                                    </li>

                                </ul>

                                <button id="add-choix" class="btn btn-outline-primary btn-sm" type="button">Ajouter Choix</button>
                            </div>


                            <button class="btn btn-default pull-right" id="submitsondageform" type="submit" style="margin-right:10px;">Publier</button>
                            <div class="clearfix"></div>


                        </div>
                        

                    </form>

                </div>
                <!-- fin sondage-->
            </div>
        </div>

    </div>

    @foreach($publications as $publication) @if($publication->type =="Sondage")
    <div class="status">
        <div class="col-md-12">
            <ul class="list-inline" style="padding-top:10px;padding-left:10px;">
                <li>
                    <img class="publisher-image" style="background-image:url({{asset($publication->user->profile->photo_profile)}});">
                </li>
                <li>
                    <ul class="list-unstyled publisher-info">
                        <li class="publisher-name">
                            <a href="{{route('user.profile',['id'=>$publication->user->id])}}">{{$publication->user->nom}} {{$publication->user->prenom}}</a>
                        </li>
                        <li>
                            <ul style="padding-left:0;" style="padding-left:0;">
                                @foreach($publication->user->roles as $role) @if($role->nom == "Administrateur")
                                <li class="role-admin">{{$role->nom}}</li>
                                @endif @if($role->nom == "Enseignant")
                                <li class="role-prof">{{$role->nom}}</li>
                                @endif @if($role->nom == "Gérant club")
                                <li class="role-club">{{$role->nom}}</li>
                                @endif @if($role->nom == "Etudiant")
                                <li class="role-etud">{{$role->nom}}</li>
                                @endif @endforeach
                            </ul>
                        </li>
                        <li class="status-time">{{$publication->created_at->diffForHumans()}}</li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-options status-options" style="padding:5px;"></i>
                </a>
                <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-top:20px;">
                    @if($publication->user->id == Auth::id())
                    <li>
                        <a href="{{route('publication.modifier',['id'=>$publication->id])}}">
                            <i class="icon-pencil"></i>
                            <span>&nbsp; Modifier</span>
                        </a>
                    </li>
                    @endif @if($publication->user->id == Auth::id())
                    <li>
                        <a id="supprimer-btn" href="{{route('publication.destroy',['id'=>$publication->id])}}">
                            <i class="icon-trash"></i>
                            <span>&nbsp; Supprimer</span>
                        </a>
                    </li>
                    @endif @if($publication->user->id != Auth::id())
                    <suivie :publication="{{$publication->id}}"></suivie>
                    @endif @if($publication->user->id != Auth::id())
                    <li>
                        <a id="signaler-btn" href="{{route('publication.signaler',['id'=>$publication->id])}}">
                            <i class="icon-flag"></i>
                            <span>&nbsp; Signaler</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <h3 class="status-title">
            <br><a href="{{route('publication.single',['slug'=>$publication->slug])}}" style="color:black">{{$publication->titre}}</a>
            <br>
            <br>
        </h3>
        <hr> @if($publication->module_id)
        <div style="text-align:center;">
            <span>Status de module :&nbsp;</span>
            <span class="module">
                <a href="index.html">$publication->module->nom</a>
                <br>
            </span>
        </div>
        @endif

        <sondage :pubcontenu="{{$publication}}" :authuser="{{Auth::user()}}"></sondage>


        <hr style="width:100%;">

        <hr style="width:100%;margin-bottom:0;">
        <jaimecommentairecommenter :publication="{{$publication->id}}" :id="{{Auth::id()}}" :image=`{{asset(Auth::user()->profile->photo_profile)}}`></jaimecommentairecommenter>

    </div>
    @else
    <div class="status">
        <div class="col-md-12">
            <ul class="list-inline" style="padding-top:10px;padding-left:10px;">
                <li>
                    <img class="publisher-image" style="background-image:url({{ asset($publication->user->profile->photo_profile) }} );">
                </li>
                <li>
                    <ul class="list-unstyled publisher-info">
                        <li class="publisher-name">
                            <a href="{{route('user.profile',['id'=>$publication->user->id])}}">{{$publication->user->nom}} {{$publication->user->prenom}}</a>
                        </li>
                        <li>
                            <ul style="padding-left:0;" style="padding-left:0;">
                                @foreach($publication->user->roles as $role) @if($role->nom == "Administrateur")
                                <li class="role-admin">{{$role->nom}}</li>
                                @endif @if($role->nom == "Enseignant")
                                <li class="role-prof">{{$role->nom}}</li>
                                @endif @if($role->nom == "Gérant club")
                                <li class="role-club">{{$role->nom}}</li>
                                @endif @if($role->nom == "Etudiant")
                                <li class="role-etud">{{$role->nom}}</li>
                                @endif @endforeach
                            </ul>
                        </li>
                        <li class="status-time">{{$publication->created_at->diffForHumans()}}</li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-options status-options" style="padding:5px;"></i>
                </a>
                <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-top:20px;">
                    @if($publication->user->id == Auth::id())
                    <li>
                        <a href="{{route('publication.modifier',['id'=>$publication->id])}}">
                            <i class="icon-pencil"></i>
                            <span>&nbsp; Modifier</span>
                        </a>
                    </li>
                    @endif @if($publication->user->id == Auth::id() || Auth::user()->isAdmin())
                    <li>
                        <a id="supprimer-btn" href="{{route('publication.destroy',['id'=>$publication->id])}}">
                            <i class="icon-trash"></i>
                            <span>&nbsp; Supprimer</span>
                        </a>
                    </li>
                    @endif @if($publication->user->id != Auth::id())
                    <suivie :publication="{{$publication->id}}" :user="{{Auth::id()}}"></suivie>
                    @endif @if($publication->user->id != Auth::id())
                    <li>
                        <a id="signaler-btn" href="{{route('publication.signaler',['id'=>$publication->id])}}">
                            <i class="icon-flag"></i>
                            <span>&nbsp; Signaler</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

        </div>
        <h3 class="status-title">
        <br> <a href="{{route('publication.single',['slug'=>$publication->slug])}}" style="color:black">{{$publication->titre}}</a>
            <br>
            <br>
        </h3>
        <hr> @if($publication->module_id)
        <div style="text-align:center;">
            <span>
                @if($publication->type =="Sondage")
                Sondage
                @elseif($publication->type =="FAQ")
                FAQ
                @elseif($publication->type =="Status")
                Status
                @else
                Tutoriel
                @endif
                de module :&nbsp;
            </span>
            <span class="module">
                <a href="{{route('publication.filtrer.module',['id'=>$publication->module_id])}}">{{$publication->module->nom}}</a>
                <br>
            </span>
        </div>
        @else
        <div style="text-align:center;">
            <span>Status Generale</span>

        </div>
        @endif





        <div>
            <div class="content">
                {!! $publication->contenu !!}

                <br>
            </div>
        </div>

        @if( count($publication->publication_avec_fichier))
        <div class="files-uploaded">
            <h4 class="files-uploaded-header">Les fichiers Télécharger</h4>
            <ul class="list-unstyled files-list">
                @foreach($publication->publication_avec_fichier as $fichier)
                <li class="single-file">
                    <span>{{$fichier->nom_fichier}}</span>
                <a  href="{{route('file.download',['id'=>$fichier->id])}}"  type="button"
                         class="download-file-link" style="float:right;">
                        <i class="icon-arrow-down-circle download-icon"></i>
                        <span style="font-size:16px;" >Télécharger</span>
                    </a>
                </li>
                <li class="clearfix divider"></li>
                @endforeach

            </ul>
        </div>
        @endif

        <hr style="width:100%;"> @auth
        <jaimecommentairecommenter :publication="{{$publication->id}}" :id="{{Auth::id()}}" :image=`{{asset(Auth::user()->profile->photo_profile)}}`></jaimecommentairecommenter>
        @endauth
    </div>
    @endif @endforeach
    <div style="text-align: center">{{$publications->links()}}</div>
</div>


<div class="col-md-3">
    @foreach(Auth::user()->roles as $role) @if($role->nom == "Administrateur" || $role->nom == "Enseignant" || $role->nom ==
    "Gérant club" )
    <a href="{{route('evenement.ajouter',['formation'=> "NTICIEN"]) }}" class="btn btn-success btn-block ">Ajouter un évènement</a>
    @break 
    @endif 
    @endforeach
    <h4 class="text-center">Les évènements</h4>
    <h4 class="text-center">
        <strong>NTICien - Général</strong>
    </h4>
    @if(count($events) == 0 || \App\Event::AllArchived($events))
    <div class="alert alert-warning" role="alert">Pas d'évenements partagé pour le moment</div>
    @else @foreach($events as $event) @if($event->is_archived == 0 )
    <div class="evenement 
            @if($event->event_role =='Administrateur' )
                admin-bar
            @elseif($event->event_role =='Enseignant')
                prof-bar
            @else
                club-bar
            @endif
            ">
        <a href="#event-collapse{{$event->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$event->id}}"
            style="text-decoration:none;">
            <h3 class="text-info even-title">{{$event->titre}}</h3>
        </a>
        <div id="event-collapse{{$event->id}}" class="collapse in">
            <p> {{$event->description}}
                <br>
            </p>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:16px;"></i>
                <span>&nbsp;Date debut :&nbsp;</span>
                <span>{{ $event->debut}}</span>
            </div>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:17px;"></i>
                <span>&nbsp;Date fin :&nbsp;</span>
                <span>{{ $event->fin }}</span>
            </div>
            {{--
            <span class="publisher">Publier par :</span> --}}
            <div style="margin-top:10px">
                <a href="{{route('user.profile',['id'=>$event->user_id])}}">
                    <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($event->user->profile->photo_profile)}});">
                </a>
                <ul class="list-unstyled publisher-info">
                    <li>
                        <a href="{{route('user.profile',['id'=>$event->user_id])}}">
                            <strong>{{$event->user->nom . ' ' . $event->user->prenom }}</strong>
                        </a>
                    </li>
                    <li>
                        @foreach($event->user->roles as $role) @if($role->nom == "Administrateur")
                        <span class="role-admin">{{$role->nom}}</span>
                        @elseif($role->nom == "Enseignant")
                        <span class="role-prof">{{$role->nom}}</span>
                        @elseif($role->nom == "Gérant club")
                        <span class="role-club">{{$role->nom}}</span>
                        @endif @endforeach

                    </li>
                </ul>
            </div>
        </div>
    </div>

    @endif @endforeach @endif {{--
    <div class="evenement prof-bar">
        <a href="#event-collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe2" style="text-decoration:none;">
            <h3 class="text-info even-title">Event title</h3>
        </a>
        <div id="event-collapse2" class="collapse">
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                <br>
            </p>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:16px;"></i>
                <span>&nbsp;Date debut :&nbsp;</span>
                <span>2018-04-06</span>
            </div>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:17px;"></i>
                <span>&nbsp;Date fin :&nbsp;</span>
                <span>2018-05-05</span>
            </div>
            <span class="publisher">Publier par :</span>
            <div>
                <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                <ul class="list-unstyled publisher-info">
                    <li>
                        <strong>Bentaleb Youssouf</strong>
                    </li>
                    <li>
                        <span class="role-prof">Enseignant</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="evenement club-bar">
        <a href="#event-collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe3" style="text-decoration:none;">
            <h3 class="text-info even-title">Event title</h3>
        </a>
        <div id="event-collapse3" class="collapse">
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                <br>
            </p>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:16px;"></i>
                <span>&nbsp;Date debut :&nbsp;</span>
                <span>2018-04-06</span>
            </div>
            <div style="font-size:15px;">
                <i class="icon-calendar" style="font-size:17px;"></i>
                <span>&nbsp;Date fin :&nbsp;</span>
                <span>2018-05-05</span>
            </div>
            <span class="publisher">Publier par :</span>
            <div>
                <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                <ul class="list-unstyled publisher-info">
                    <li>
                        <strong>Bentaleb Youssouf</strong>
                    </li>
                    <li>
                        <span class="role-club">Club GDG</span>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
</div>


@endsection