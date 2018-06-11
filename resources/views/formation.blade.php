@extends('layouts.app') @section('content')
<div >
    <div class="container" >
        <div class="row">
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
                        <div class="tab-content">
                            <div class="tab-pane" role="tabpanel" id="tab-1">

                                <form action="{{route('status.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                                        <select class="module-options" name="status_module" style="margin-right:0;">
                                               
                                             @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
                                          
                                           

                                        </select>


                                    </div>



                                    <textarea class="form-control content" name="status" id="summernote-status" required></textarea>
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
                                </form>

                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">

                                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                                        <select class="module-options" name="blog_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="blog" id="summernote-blog" required></textarea>

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
                                    <input type="hidden" name="type" value="blog">

                                </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">

                                <form action="{{route('faq.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                                        <select class="module-options" name="faq_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="faq" id="summernote-faq" required></textarea>
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

                                </form>
                            </div>
                            <div class="tab-pane active" role="tabpanel" id="tab-4">

                                <form action="{{route('sondagechoix.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;" required>

                                        <select class="module-options" name="sondage_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="sondage" id="summernote-sondage" required></textarea>
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
                                    <input type="file" name="file" multiple="" id="file_sondage" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                                    <div class="box" style="margin-left:10px;display:  inline-block;">
                                        <input type="file" name="files[]" id="file-sondage" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                            multiple="">
                                        <label for="file-sondage" style="border: 1px solid #448ccb; ">
                                            <span></span>
                                            <strong style="font-weight:400;">Choose a file…</strong>
                                        </label>
                                    </div>
                                    <button class="btn btn-default" type="submit" id="publier-status">Publier</button>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
               @foreach($publications as $module)
                @foreach($module->publications as $publication)
                @if($publication->signaler == 0)
                <div class="status">
                        <div class="col-md-12">
                    <ul class="list-inline">
                        <li>
                            <img class="publisher-image" style="background-image:url({{$publication->user->profile->photo_profile}});">
                        </li>
                        <li>
                            <ul class="list-unstyled publisher-info">
                                <li class="publisher-name"><a href="{{route('user.profile',['id'=>$publication->user->id])}}">{{$publication->user->nom}} {{$publication->user->prenom}}</a></li>
                                <li>
                                    <ul style="padding-left:0;" style="padding-left:0;">
                                        @foreach($publication->user->roles as $role)
                                                    @if($role->nom == "Administrateur")
                                                    <li class="role-admin">{{$role->nom}}</li>
                                                    @endif
                                                    @if($role->nom == "Enseignant")
                                                    <li class="role-prof">{{$role->nom}}</li>
                                                    @endif
                                                    @if($role->nom == "Gérant club")
                                                    <li class="role-club">{{$role->nom}}</li>
                                                    @endif
                                                    @if($role->nom == "Etudiant")
                                                    <li class="role-etud">{{$role->nom}}</li>
                                                    @endif
                                                @endforeach
                                        </ul>
                                </li>
                                <li class="status-time">{{$publication->created_at->diffForHumans()}}</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-options status-options"></i>
                        </a>
                        <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-top:20px;">
                            @if($publication->user->id == Auth::id())
                            <li>
                                    <a href="{{route('publication.modifier',['id'=>$publication->id])}}">
                                        <i class="icon-pencil"></i>
                                        <span>&nbsp; Modifier</span>
                                    </a>
                                </li>
                                @endif
                               @if($publication->user->id == Auth::id() || Auth::user()->isAdmin())
                               <li>
                                    <a  id="supprimer-btn" href="{{route('publication.destroy',['id'=>$publication->id])}}">
                                        <i class="icon-trash"></i>
                                        <span>&nbsp; Supprimer</span>
                                    </a>
                                </li>
                               @endif
                               @if($publication->user->id != Auth::id())
                               <suivie :publication="{{$publication->id}}" ></suivie>
                                @endif
                              
                                @if($publication->user->id != Auth::id())
                                <li>
                                    <a  id="signaler-btn" href="{{route('publication.signaler',['id'=>$publication->id])}}">
                                        <i class="icon-flag"></i>
                                        <span>&nbsp; Signaler</span>
                                    </a>
                                </li>
                                @endif
                        </ul>
                    </div>
                </div>
                    <h3 class="status-title">{{$publication->titre}}</h3>
                    <hr>
                    <div style="text-align:center;">
                        <span>Status de module :&nbsp;</span>
                        <span class="module">
                            <a href="{{route('publication.filtrer.module',['id'=>$publication->module_id])}}">{{$module->nom}}</a>
                            <br>
                        </span>
                    </div>
                    <div>
                        <div class="content">
                                {!! $publication->contenu !!}
                                <br> </div>
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
                @endif
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection