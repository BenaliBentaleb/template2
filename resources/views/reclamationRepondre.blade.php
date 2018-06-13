@extends('layouts.app') @section('content')

<div class="col-md-9">
    <div class="pub-header" style="padding:10px 30px;">
        <div class="card-header" style="margin-bottom:30px;">
            <h3 class="card-title">Réclamation : {{ $reclamation->title }}</h3>


        </div>
        <div class="card-body">

            <div class="form-group">

                <div class="form-group">
                    <div class="row gutters-xs">
                        <div class="col-md-3 my-2">
                            Le propriétaire
                        </div>
                        <div class="col-md-9">
                            
                                <span class="avatar avatar-xl" style="float:left;margin-right:10px;background-image: url({{ asset($reclamation->user->profile->photo_profile) }})"></span>
                                <span class="ml-2 " style="display:block;">
                                    <span class="text-default">{{ $reclamation->user->nom . ' ' . $reclamation->user->prenom}} ( vous même )</span>
                                    <small class="text-muted mt-1" style="display:block;">
                                        @foreach($reclamation->user->roles as $role) @if($role->nom == "Administrateur")
                                        <span class="role-admin">Administrateur</span>
                                        @elseif($role->nom =="Enseignant")
                                        <span class="role-prof">Enseignant</span>
                                        @elseif($role->nom =="Gérant club")
                                        <span class="role-club">Gérant Club</span>
                                        @elseif($role->nom =="Etudiant")
                                        <span class="role-etudiant">Etudiant</span>
                                        @endif @endforeach

                                    </small>

                                </span>
                            
                        </div>
                    </div>
                </div>
                </a>

                <div class="form-group">
                        <div class="row ">
                            <div class="col-md-3 my2">
                                État
                            </div>
    
                            <div class="col-md-6">
                                    <span style="padding:4px 10px;font-size:13px;"
                                @if($reclamation->status == 0)
                                    class="badge badge-warning">En attente
                                    @elseif($reclamation->status == 1)
                                    class="badge badge-success">Terminé
                                    @elseif($reclamation->status == 2)
                                     class="badge badge-danger">Rejeté
                                @endif
                            </span>
                            </div>
    
                        </div>
    
                    </div>
                
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-3 my2">
                            Formation
                        </div>

                        <div class="col-md-6">
                                @if($reclamation->user->profile->formation)
                                
                                {{$reclamation->user->profile->formation->nom}} 
                                @else
                                Étudiant extérieur

                                @endif
                            </div>

                    </div>

                </div>
                
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-3 my-2">
                            <span class="">Type de récmamation :</span>
                            {{ $reclamation->type }}
                        </div>
                        <div class="col-md-4">

                            <input type="text" class="form-control" style="cursor:auto;box-shadow:none;" disabled  value="{{ $reclamation->Type }}" >
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-3 my-2">
                            <span class="">Contenu :</span>

                        </div>
                        <div class="col-md-9 my-2">

                            <p> {{ $reclamation->reclamation }}</p>
                        </div>
                    </div>

                </div>

                
                <div class="form-group">
                    <span>Chat :</span>
                    
                    @if(count($reclamation_chat) == 0)
                    <div role="alert" class="alert alert-warning" style="margin-bottom:40px; margin-top:30px">
                        Pas de messages ! 
                    </div>
                    @else
                    <div class="row">
                            <div class="form-group col-11 mx-auto reclamation-chat-content" style="@if(count($reclamation_chat)<=2)     height: -webkit-calc(25vh); @endif ">
                                <div class="messages">
    
                                @foreach($reclamation_chat as $c) 
                                    @if($c->sender_id == Auth::id())
                                    <div class="msg-recieved">
                                        <span class="msg-time">{{$c->created_at->diffForHumans()}}</span>
                                        <div class="clearfix"></div>
                                        <p>
                                            {{$c->chat}}
                                            <br>
                                        </p>
                                    </div>
    
    
                                    @else
                                    <div class="msg-sent">
    
                                        <a href="{{route('user.profile',['id' => $c->sender_id])}}">
                                            <span class="avatar avatar-lg" style="float:left;background-image:url({{ asset(\App\User::getProfile($c->sender_id)->photo_profile) }})">
                                            </span>
                                        <div style="float:left;display:inline-block;margin-left:10px;">
                                                <span class="text-default">{{App\User::find($c->sender_id)->nom}}</span> 
                                            </a>
                                                <small >
                                                    <span class="msg-time">{{$c->created_at->diffForHumans()}}</span></small></span>

                                        </div>
                                    
                                        <div class="clearfix"></div>
                                        <p>
                                            {{$c->chat}}
                                            <br>
                                        </p>
                                    </div>
                                    @endif
    
                                    <div class="clearfix"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif

                </div>  
                @if($reclamation->status ==0)
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-3 my-2">
                            <span class="">Réponse :</span>

                        </div>
                        <div class="col-md-9 my-2">
                            <form method="post" action="{{route('user.reclamation.sendmsg',['id' => $reclamation->id ])}}">
                                {{csrf_field()}}



                                <textarea required rows="2" name="msg" class="form-control"></textarea>
                                <input style="margin-top:20px;" type="submit" class="btn btn-primary mt-2" value="Envoyer">


                            </form>
                        </div>
                    </div>
                </div>
                @endif


            </div>



        </div>
        <div class="card-footer">
            <div class="btn-list text-right">
                <a href="{{route('reclamation.index')}}" class="btn btn-secondary">Retour</a>
            </div>
        </div>

    </div>
</div>
@endsection