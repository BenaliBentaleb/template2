@extends('layouts.app') @section('content')


<div class="col-md-12" style="padding:0;">
    <form id="cover-form" method="POST" action="{{route('user.profile.coverture',['id'=>$user->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" accept="image/*" name="cover" id="cover" style="display:none;">
        <div class="profile-cover" style="background:url({{asset($user->profile->coverture)}});background-size:cover;background-repeat:no-repeat;background-position:center center;background-attachment:fixed;">
            @if($user->id == Auth::id())
            <div class="mask text-center">
                <label for="cover">
                    <span class="uploader-photo" style="width:100%;margin-top:16px;">
                        <i class="icon-picture" style="margin-right:10px;"></i>Modifier photo de couverutre</span>
                </label>
            </div>
            @endif
        </div>
    </form>
</div>
<div class="col-md-10 col-md-offset-1 profile" style="margin-top:-100px;">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div>
                <form id="profile-picture-form" method="POST" action="{{route('user.profile.picture',['id'=>$user->id])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" accept="image/*" name="profilepicture" id="profile-picture" style="display:none;">
                    <label for="profile-picture"></label>
                    <div class="profile-img" style="background-image:url({{asset($user->profile->photo_profile)}});background-size:cover;background-repeat:no-repeat;">
                        @if($user->id == Auth::id())
                        <div class="upload-profile-picture text-center">
                            <label for="profile-picture" style="margin-top:86px;">
                                <span class="uploader-photo">
                                    <i class="icon-picture" style="margin-right:10px;"></i>Modifie photo</span>
                            </label>
                        </div>
                        @endif
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

<div style="margin-bottom:20px;">


        @if(Auth::id() == $user->id)
        <button class="btn btn-primary btn-block modify-profile" type="button" style="width:75%;margin:0 auto;" data-toggle="modal"
         data-target=".modify-profile-modal">
         <i class="icon-pencil">
             Modifier profile
         </i>

       
         </button>   
         @endif    
     
     <!-- <modifierprofile :user_id="{{$user->id}}"></modifierprofile>-->
     @if(Auth::id() != $user->id)
    
     <amie :profile_user_id="{{$user->id}}"></amie>
     @endif
   

</div>
               <!-- <button class="btn btn-danger btn-block" type="button" style="width:75%;margin:5px auto;">
                    <i class="icon-user-unfollow"></i>Supprimer
                </button>-->

            </div>
        </div>
        <div class="col-sm-8">
            <div class="user-info">
                <h2>{{$user->nom.' '. $user->prenom}}</h2>
                @if($formation_user)
                <h5>{{ $formation_user->nom}}</h5>
                @else
                <h5>Étudiant extérieur</h5>
                @endif
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
                    @if(isset($user->profile->information))
                        <span style="font-size:16px;font-weight:bold;">&nbsp;A propos :</span>
                        <p>{{$user->profile->information}}
                            <br>
                        </p>
                    @endif
                    <div style="margin-bottom:10px;">
                        <h4 style="font-size:16px;font-weight:bold;">Informations personnels :</h4>
                        <div style="margin-top:5px;margin-bottom:5px;">
                            <span style="font-weight:bold;">Email :&nbsp;</span>
                            <span>{{$user->profile->email}}</span>
                        </div>
                        @if(isset($user->profile->telephone))
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Numéro de téléphone :&nbsp;</span>
                            <span>(+213)&nbsp;{{$user->profile->telephone}}</span>
                        </div>
                        @endif

                        @if(isset($user->profile->date_naissance))
                        <div style="margin-bottom:5px;">
                            <span style="font-weight:bold;">Date de naissance :&nbsp;</span>
                            <span>{{$user->profile->date_naissance}}</span>
                        </div>
                        @endif
                        @if(isset($user->profile->addresse))
                        <div>
                            <span style="font-weight:bold;">Adresse :&nbsp;</span>
                            <span>{{$user->profile->addresse}}.</span>
                        </div>
                        @endif
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
        <form id="user" action="{{route('user.profile',['id'=>$user->id])}}" class="form-group" method="get">
            <span style="font-size:16px;">Afficher les publications :&nbsp;</span>

            <select class="pub-select form-control" name="type" onchange="event.preventDefault();
            document.getElementById('user').submit();">
                <option value="Tous" @if($type == "Tous") selected @endif >Tous</option>
                <option value="Status" @if($type == "Status") selected @endif>Status</option>
                <option value="Tutoriel" @if($type == "Tutoriel") selected @endif>Tutoriel</option>
                <option value="FAQ" @if($type == "FAQ") selected @endif>FAQ</option>
                <option value="Sondage" @if($type == "Sondage") selected @endif>Sondage</option>
            </select>

        </form>
    </div>
</div>


<div class="container">
<div class="row">
    @if(count($publications)) @foreach($publications as $publication)
    <div class="col-md-6 pull-right" style="padding-left:0;">

        <div class="status">
            <div class="row">
                <div class="col-xs-10" style="padding-right:0;">
                    <a href="{{route('user.profile',['id'=>$user->id])}}">
                        <img class="publisher-image" style="background-image:url(&quot;{{asset($publication->user->profile->photo_profile)}}&quot;);width:55px;height:55px;margin-top:15px;margin-left:10px;">
                    </a>
                    <ul class="list-inline" style="padding-top:10px;padding-left:10px;width:74%;">
                        <li>
                            <ul class="list-unstyled publisher-info">
                                <li class="publisher-name">
                                    <a href="{{route('user.profile',['id'=>$user->id])}}">
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
                                <a href="{{route('publication.modifier',['id'=>$publication->id])}}">
                                    <i class="icon-pencil"></i>
                                    <span>&nbsp; Modifier</span>
                                </a>
                            </li>

                            <li>
                                <a  id="supprimer-btn"  href="{{route('publication.destroy',['id'=>$publication->id])}}">
                                    <i   class="icon-trash"></i>
                                    <span>&nbsp; Supprimer</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
           
                <h3 class="status-title" style="margin-top:10px;"><a href="{{route('publication.single',['slug'=>$publication->slug])}}" style="color:black">{{$publication->titre}}</a></h3>

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
            <jaimecommentairecommenter :publication="{{$publication->id}}" :id="{{$user->id}}" :image=`{{asset(Auth::user()->profile->photo_profile)}}`></jaimecommentairecommenter>



        </div>

    </div>
    @endforeach @else
    <h1 class="text-center">aucune publication</h1>
    @endif
</div>
</div>
<!-- action="{{route('user.profile.update',['id'=>Auth::id()])}}"-->
 <form   id="Register" method="post" >
    {{ csrf_field() }}

    <div  id="modifierprofile" class="modal fade modify-profile-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4>Modifie profile</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nom">Nom et prenom :</label>
                                <div class="form-group ">
                                    <input type="text" value ="{{$user->nom.' '.$user->prenom}}" value="{{ old('nom_prenom') }}" name="nom_prenom" placeholder="Nom et prenom" id="nom" class="form-control">
                                    
                                    <span class="text-danger">
                                        <strong id="name-error" ></strong>
                                    </span>
                                  
                                </div>
                                <label>Email :</label>
                                <div class="form-group ">
                                    <input type="email" name="email" value ="{{$user->email}}" placeholder="Votre email" id="email" class="form-control">
                                   
                                    <span class="text-danger">
                                        <strong id="email-error"></strong>
                                    </span>
                                  
                               
                                </div>
                                <label>Mot de Passe :</label>
                                <div class="form-group ">
                                    <input type="password" name="password"   placeholder="Votre mot de pass" id="password" class="form-control">
                                   
                                   
                               
                                </div>

                                <label style="margin-top:7px;">Formation :</label>
                                <div class="form-group  formation-select">
                                    <select class="form-control" name="formation" value="{{ old('formation') }}">
                                            
                                            @foreach($depfromation as $key=> $formation)
                                        <optgroup label="Departement {{$key}}">
                                           
                                            @foreach($formation as $f) 
                                            <option value="{{$f->id}}">{{$f->nom}}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    <!--    <optgroup label="Departement IFA">
                                            <option value=1>Licence - TI</option>
                                            <option value=1>Licence - SCI</option>
                                            <option value=1>Master 1 - STIC </option>
                                            <option value=1>Master 1 - RSD</option>
                                            <option value=1>Master 2 - STIC</option>
                                            <option value=1>Master 2 - RSD</option>
                                        </optgroup>
                                        <optgroup label="Departement TLSI">
                                            <option value=1>Licence - GL</option>
                                            <option value=1>Licence SI</option>
                                            <option value=1>Master 1 - STIW</option>
                                            <option value="1">Master 1 GL</option>
                                            <option value=1>Master 2 - STIW</option>
                                            <option value=1>Master 2 - GL</option>
                                        </optgroup>-->
                                    </select>
                                   
                                    <span class="text-danger">
                                        <strong id="formation-error"></strong>
                                    </span>
                               
                                </div>
                                <div class="clearfix"></div>
                                <label for="nom">Date de naissance :</label>
                                <div class="form-group ">
                                    <input type="date" name="date_naissance"  value ="{{$user->profile->date_naissance}}" value="{{ old('date_naissance') }}" class="form-control">
                               
                                    <span class="text-danger">
                                        <strong id="date_naissance-error"></strong>
                                    </span>
                             
                                </div>
                                <label for="nom">Adresse :</label>
                                <div class="form-group ">
                                    <textarea placeholder="Adresse" name="addresse"  class="form-control" style="resize:none;">{{ $user->profile->addresse }}</textarea>
                                    
                                   
                                    <span class="text-danger">
                                        <strong id="addresse-error"></strong>
                                    </span>
                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="numero_telephone">Numéro de téléphone :</label>
                                <div class="form-group ">
                                    <input type="text"  pattern="[0]{1}[5-7]{1}-[4-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}" title="format 0x-xx-xx-xx-xx" name="numero_telephone" value ="{{$user->profile->telephone}}"{{--  value="{{ old('numero_telephone') }}" --}} placeholder="Numéro de téléphone" id="numero_telephone" class="form-control" required>
                                  
                                    <span class="text-danger">
                                        <strong id="numero_telephone-error"></strong>
                                    </span>
                                  
                                </div>
                                <label for="nom">A propos :</label>
                                <div class="form-group">
                                    <textarea rows="3" name="informations" placeholder="A propos" class="form-control" style="resize:none;">{{$user->profile->information}}</textarea>
                                    
                                    <span class="text-danger">
                                        <strong id="informations-error"></strong>
                                    </span>
                              
                                </div>
                                <div class="input-group form-group ">
                                    <span id="facebook-input" class="input-group-addon">&nbsp;
                                        <i class="fa fa-facebook-f"></i>
                                    </span>
                                    <input type="url" name="facebook" placeholder="Lien de votre profile Facebook" value="{{$user->profile->facebook}}" class="form-control" aria-describedby="facebook-input">
                                </div>
                                <span class="text-danger">
                                    <strong id="facebook-error"></strong>
                                </span>
                                <div class="input-group form-group ">
                                    <span id="twitter-input" class="input-group-addon">
                                        <i class="fa fa-twitter"></i>
                                    </span>
                                    <input type="url" name="twitter" placeholder="Lien de votre profile Twitter "  value="{{$user->profile->twitter}}" class="form-control" aria-describedby="facebook-input">
                                   
                                </div>
                                <span class="text-danger">
                                    <strong id="twitter-error"></strong>
                                </span>
                                <div class="input-group form-group ">
                                    <span id="insta-input" class="input-group-addon">
                                        <i class="fa fa-instagram"></i>
                                    </span>
                                    <input type="url" name="instagram" placeholder="Lien de votre profile Instagram"  value="{{$user->profile->instagram}}" class="form-control" aria-describedby="facebook-input">
                                    
                                </div>
                                <span class="text-danger">
                                    <strong id="instagram-error"></strong>
                                </span>
                                <div class="input-group form-group ">
                                    <span id="youtube-input" class="input-group-addon">
                                        <i class="fa fa-youtube"></i>
                                    </span>
                                    <input type="url" name="youtube" value="{{$user->profile->youtube}}" placeholder="Lien de votre chaine Youtube" class="form-control" aria-describedby="facebook-input">
                                    
                                </div>
                                <span class="text-danger">
                                    <strong id="youtube-error"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id ="submitForm" class="btn btn-success" data-id="{{Auth::id()}}">Enregistrer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </form> 
</div>
</div>
</div>
</div>
 

@endsection