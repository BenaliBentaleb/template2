@extends('admin.index') @section('admin')

            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Réclamation : {{ $reclamation->title }}</h3>

                                @if($reclamation->status ==0)
                                <div class="ml-auto">
                                    Marquer comme :

                                    <a href="{{route('admin.reclamation.terminer',['id' => $reclamation->id])}}" class="btn badge badge-success p-2">Terminé</a>

                                    <a href="{{route('admin.reclamation.rejeter',['id' => $reclamation->id])}}" class="btn badge badge-danger p-2">Rejeté</a>
                                </div>
                                @endif



                            </div>
                            <div class="card-body">

                                    <div class="form-group">

                                        <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my-2">
                                                    Le propriétaire
                                                </div>
                                                <div class="col-9">
                                                    <a href="#" class="nav-link pl-0 pr-0 leading-none">
                                                        <span class="avatar" style="background-image: url({{ asset($reclamation->user->profile->photo_profile) }})"></span>
                                                        <span class="ml-2 d-none d-lg-block">
                                                            <span class="text-default">{{ $reclamation->user->nom . ' ' . $reclamation->user->prenom}}</span>
                                                            <small class="text-muted d-block mt-1">
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
                                        @if($reclamation->user->profile->formation) 
                                        <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my2">
                                                    Formation
                                                </div>
                                               
                                                <div class="col-6">
                                                    {{$reclamation->user->profile->formation->nom}}
                                                </div>
                                              
                                            </div>

                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my-2">
                                                    <span class="">Type de récmamation :</span>

                                                </div>
                                                <div class="col-4">

                                                    <input type="text" class="form-control" name="example-disabled-input" value="{{ $reclamation->Type }}" disabled>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my-2">
                                                    <span class="">Contenu :</span>

                                                </div>
                                                <div class="col-9 my-2">

                                                    <p> {{ $reclamation->reclamation }}</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <span>Chat :</span>
                                            <div class="row reclamation-chat-content mt-2">
                                                <div class="form-group col-11 mx-auto chat-content">
                                                    <div class="messages">

                                                        @foreach($chat as $c) @if($c->sender_id == Auth::id())
                                                        <div class="msg-sent">

                                                            <span class="avatar" style="background-image:url({{ asset(Auth::user()->profile->photo_profile)}})">
                                                            </span>
                                                            <span class="msg-time">{{$c->created_at->diffForHumans()}}</span>
                                                            <p>
                                                                {{$c->chat}}
                                                                <br>
                                                            </p>
                                                        </div>

                                                        @else
                                                        <div class="msg-recieved">
                                                            <span class="msg-time">{{$c->created_at->diffForHumans()}}</span>
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

                                        </div>

                                        @if($reclamation->status ==0)
                                        <div class="form-group">
                                            <div class="row gutters-xs">
                                                <div class="col-3 my-2">
                                                    <span class="">Réponse :</span>

                                                </div>
                                                <div class="col-9 my-2">
                                                <form method="post" action="{{route('admin.reclamation.oo',['id' => $reclamation->id ])}}">
                                                    {{csrf_field()}}
                                                    


                                                        <textarea required rows="2" name="msg" class="form-control"></textarea>
                                                        <input type="submit" class="btn btn-primary mt-2" value="Envoyer">

                                                   
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endif


                                    </div>



                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <a href="{{route('admin.reclamation')}}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
     @endsection
