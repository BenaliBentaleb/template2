@extends('layouts.app') @section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($publications as $publication)
            <div class="status">
                <div class="col-md-12">
                    <ul class="list-inline" style="padding-top:10px;padding-left:10px;">
                        <li>
                            <img class="publisher-image" style="background-image:url(&quot;{{asset($publication->user->profile->photo_profile)}}&quot;);">
                        </li>
                        <li>
                            <ul class="list-unstyled publisher-info">
                                <li class="publisher-name"><a href="{{route('user.profile',['id'=>$publication->user->id])}}">{{$publication->user->nom}} {{$publication->user->prenom}}</a></li>
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
                    <br>{{$publication->titre}}
                    <br>
                    <br>
                </h3>
                <hr> @if($publication->module_id)
                <div style="text-align:center;">
                    <span>Status de module :&nbsp;</span>
                    <span class="module">
                        <a href="{{route('publication.filtrer.module',['id'=>$publication->module_id])}}">{{$publication->module->nom}}</a>
                        <br>
                    </span>
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



                <jaimecommentairecommenter :publication="{{$publication->id}}" :id="{{Auth::id()}}" :image=`{{asset(Auth::user()->profile->photo_profile)}}`></jaimecommentairecommenter>

            </div>

            @endforeach

        </div>
    </div>
</div>


@endsection