@extends('layouts.app') @section('content')


<div class="col-md-12" style="padding:0;">
    <form id="cover-form" method="POST" action="{{route('user.profile.coverture',['id'=>$user->id])}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="file" accept="image/*" name="cover" id="cover" style="display:none;">
        <div class="profile-cover" style="background:url({{asset($user->profile->coverture)}});background-size:cover;background-repeat:no-repeat;background-position:center center;background-attachment:fixed;">
            <div class="mask text-center">
                <label for="cover">
                    <span class="uploader-photo" style="width:100%;margin-top:16px;">
                        <i class="icon-picture" style="margin-right:10px;"></i>Modifier photo de couverutre</span>
                </label>
            </div>
        </div>
    </form>
</div>
<div class="col-md-10 col-md-offset-1 profile" style="margin-top:-100px;">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div>
                <form id="profile-picture-form" method="POST" action="{{route('user.profile.picture',['id'=>$user->id])}}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input type="file" accept="image/*" name="profilepicture" id="profile-picture" style="display:none;">
                    <label for="profile-picture"></label>
                    <div class="profile-img" style="background-image:url({{asset($user->profile->photo_profile)}});background-size:cover;background-repeat:no-repeat;">
                        <div class="upload-profile-picture text-center">
                            <label for="profile-picture" style="margin-top:86px;">
                                <span class="uploader-photo">
                                    <i class="icon-picture" style="margin-right:10px;"></i>Modifie photo</span>
                            </label>
                        </div>
                    </div>
                </form>
                <ul class="list-inline social-links text-center">
                    <li class="facebook">
                        <a href="{{$user->profile->facebook}}">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->instagram}}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->twitter}}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$user->profile->youtube}}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <button class="btn btn-primary btn-block modify-profile" type="button" style="width:75%;margin:0 auto;">
                    <i class="icon-pencil"></i>Modifier profile</button>
             @if(Auth::id() != $user->id)
                 <amie :profile_user_id="{{$user->id}}"></amie>
             @endif

                            <button class="btn btn-danger btn-block" type="button" style="width:75%;margin:5px auto;"> <i class="icon-user-unfollow"></i>Supprimer</button>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="user-info">
                <h2>{{$user->nom.' '. $user->prenom}}</h2>
                <h5>Licence TI</h5>
                <ul style="padding-left:0;">
                    @foreach($user->roles as $role) @if($role->nom == "Administrateur")
                    <li class="role-admin">{{$role->nom}}</li>
                    @endif @if($role->nom == "Enseignant")
                    <li class="role-prof">{{$role->nom}}</li>
                    @endif @if($role->nom == "Gérant club")
                    <li class="role-club">{{$role->nom}}</li>
                    @endif @if($role->nom == "Etudiant")
                    <li class="role-etud">{{$role->nom}}</li>
                    @endif @endforeach



                </ul>
                <div>
                    <span style="font-size:16px;font-weight:bold;">&nbsp;A propos :</span>
                    <p>{{$user->profile->information}}
                        <br>
                    </p>
                    <div style="margin-bottom:10px;">
                        <h4 style="font-size:16px;font-weight:bold;">Informations personnels :</h4>
                        <div style="margin-top:5px;margin-bottom:5px;">
                            <span style="font-weight:bold;">Email :&nbsp;</span>
                            <span>{{$user->profile->email}}</span>
                        </div>
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Numéro de téléphone :&nbsp;</span>
                            <span>+213-{{$user->profile->telephone}}</span>
                        </div>
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Date de naissance :&nbsp;</span>
                            <span>{{$user->profile->date_naissance}}</span>
                        </div>
                        <div>
                            <span style="font-weight:bold;">Adresse :&nbsp;</span>
                            <span>{{$user->profile->addresse}}.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row pub-header" style="margin-top:20px;">
    <div class="col-sm-8" style="margin-bottom:10px;">
        <h4 style="display:inline-block;margin-top:20px;margin-bottom:0px;">Les publication partagé par :&nbsp;</h4>
        <h4 style="display:inline-block;margin-top:0px;">{{$user->nom.' '.$user->prenom }}</h4>
    </div>
    <div class="col-sm-4" style="margin-top:13px;margin-bottom:10px;">
        <form id="user" action="{{route('user.publication',['id'=>$user->id])}}" class="form-group" method="get">
            <span style="font-size:16px;">Afficher les publications :&nbsp;</span>

            <select class="pub-select form-control" name="type" onchange="event.preventDefault();
            document.getElementById('user').submit();">
                <option value="Tous">Tous</option>
                <option value="Status">Status</option>
                <option value="Tutoriel">Tutoriel</option>
                <option value="FAQ">FAQ</option>
                <option value="Sondage">Sondage</option>
            </select>

        </form>
    </div>
</div>



<div class="row">
    @if(count($publications)) @foreach($publications as $publication)
    <div class="col-md-6" style="padding-left:0;">

        <div class="status">
            <div class="row">
                <div class="col-xs-10" style="padding-right:0;">
                    <a href="profile.html">
                        <img class="publisher-image" style="background-image:url(&quot;{{asset('assets/img/customer.png')}}&quot;);width:55px;height:55px;margin-top:15px;margin-left:10px;">
                    </a>
                    <ul class="list-inline" style="padding-top:10px;padding-left:10px;width:74%;">
                        <li>
                            <ul class="list-unstyled publisher-info">
                                <li class="publisher-name">
                                    <a href="profile.html">
                                        <strong>{{$user->nom}} {{$user->prenom}}</strong>
                                        <br>
                                    </a>
                                </li>
                                <li>
                                    <ul style="padding-left:0;">
                                        @foreach($user->roles as $role) @if($role->nom == "Administrateur")
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
                </div>
                <div class="col-xs-2" style="padding-left:0;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-options status-options" style="padding:5px;"></i>
                        </a>
                        <ul class="list-unstyled dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="#">
                                    <i class="icon-pencil"></i>
                                    <span>&nbsp; Modifier</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{route('publication.destroy',['id'=>$publication->id])}}">
                                    <i class="icon-trash"></i>
                                    <span>&nbsp; Supprimer</span>
                                </a>
                            </li>
                           
                          <!--  <li>
                                <a href="#">
                                    <i class="icon-eyeglass"></i>
                                    <span>&nbsp; Suivre</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="icon-flag"></i>
                                    <span>&nbsp; Signaler</span>
                                </a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <h3 class="status-title" style="margin-top:10px;">{{$publication->titre}}
                <br>
            </h3>
            <hr>
            <div style="text-align:center;">
                    
                
                        <span>Status Generale</span>
                 
            </div>
            <div>
                <div class="content">{!! $publication->contenu !!}
                    <br>
                </div>
                <img class="img-responsive content-image" src="{{asset('assets/img/image-left-sub.png')}}">
            </div>

            @if( count($publication->publication_avec_fichier))
            <div class="files-uploaded">
                <h4 class="files-uploaded-header">Les fichiers Télécharger</h4>
                <ul class="list-unstyled files-list">
                    @foreach($publication->publication_avec_fichier as $fichier)
                    <li class="single-file">
                        <span>{{$fichier->nom_fichier}}</span>
                        <a href="{{route('file.download',['id'=>$fichier->id])}}" class="download-file-link" style="float:right;">
                            <i class="icon-arrow-down-circle download-icon"></i>
                            <span style="font-size:16px;">&nbsp;Télécharger</span>
                        </a>
                    </li>
                    <li class="clearfix divider"></li>
                    @endforeach

                </ul>
            </div>

            @endif
            <hr style="width:100%;">
            <jaimecommentairecommenter :publication="{{$publication->id}}" :id="{{$user->id}}"></jaimecommentairecommenter>



        </div>

    </div>
    @endforeach @else
    <h1 class="text-center">accune publication</h1>
    @endif
</div>








@endsection