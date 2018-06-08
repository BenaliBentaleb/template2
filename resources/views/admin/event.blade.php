
             @extends('admin.index') @section('admin')
            

            <div class="my-3 my-md-4">
                <div class="container">

                    <div class="page-header">
                        <h1 class="page-title ">Les événements partagées</h1>

                        <div class="ml-auto shuffle">
                            @if(count($events) > 0)
                            <span class="mr-5">Trier par :</span>
                            <button class="btn btn-secondary" type="button" data-mixitup-control data-filter="all">Tous</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".archive">Archive</button>
                            @endif
                            <a href="{{ route('admin.event.ajout') }}" class="btn btn-success ml-5">Ajouter événement</a>
                        </div>

                    </div>
                    <div class="row row-cards row-deck" id="publications">
                        @if(count($events) == 0)
                        <div class="col-md-12 mb-4 ">
                            <div class="col-md-6 pb-6 mx-auto alert alert-icon alert-primary" role="alert">
                                <i class="fe fe-bell mr-2" aria-hidden="true"></i> Pas d'événements partagés
                            </div>
                        </div>
                        @else @foreach($events as $e)

                        <div class="col-lg-4 mix @if($e->is_archived == 1)  archive  @endif ">
                            <div class="card">
                                <div class="card-status
                                @if($e->is_archived ==1 )
                                bg-gray
                                @else
                                    @if($e->event_role == "Administrateur") 
                                    bg-admin 
                                    @elseif($e->event_role == "Enseignant")
                                    bg-prof
                                    @else
                                    bg-club
                                    @endif
                                @endif
                                "></div>
                                <div class="card-body d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4>
                                                <a href="#">{{ $e->titre }}</a>
                                            </h4>
                                        </div>
                                        <div class="col-md-2 " style="padding-right: 0;">
                                            <div class="item-action dropdown float-right">
                                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('admin.event.modifie',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-edit"></i> Modifier </a>
                                                    <a href="{{ route('admin.event.delete',['id' => $e->id] ) }}" id="delete-event" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-trash"></i> Supprimer </a>
                                                    <div class="dropdown-divider"></div>
                                                    @if($e->is_archived == "1")
                                                    <a href="{{ route('admin.event.unarchive',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-eye"></i> Désarchiver</a>
                                                    @else

                                                    <a href="{{ route('admin.event.archiver',['id' => $e->id ]) }}" class="dropdown-item">
                                                        <i class="dropdown-icon fe fe-eye-off"></i> Archiver</a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="text-muted">
                                        {{ str_limit($e->description,100) }}
                                    </div>
                                    <div class="mx-auto" style="height: 1px;background-color: #ccc;width: 80%;margin: 15px 0;"></div>
                                    <div>
                                        <span class="text-muted">Date début :</span>&nbsp;
                                        <span>{{ $e->debut }}</span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Date fin :</span>&nbsp;
                                        <span>{{ $e->fin }}</span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Formation :</span>&nbsp;
                                        @if($e->formation_id=='')
                                            <span>NTICien</span>
                                        @else
                                            <span>{{$e->formation->nom}}</span>
                                        @endif
                                    </div>

                                    @if($e->is_archived == 1)
                                    <div>
                                        <span class="badge bg-gray text-white">Événement archivé</span>&nbsp;
                                    </div>
                                    @endif
                                    <div class="mx-auto" style="height: 1px;background-color: #ccc;width: 80%;margin: 15px 0;"></div>
                                    <div>
                                        <span class="text-muted">Publier en tant que :</span>&nbsp;
                                        <span></span>
                                        @if($e->event_role == "Administrateur") Administrateur @elseif($e->event_role == "Enseignant") Enseignant @else Gérant club
                                        @endif
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="avatar avatar-md mr-3" style="background-image: url({{ asset($e->user->profile->photo_profile ) }})"></div>
                                        <div>
                                            <a href="{{ route('user.profile',['id' => $e->user_id ]) }}" class="text-default">{{ $e->user->nom . ' ' . $e->user->prenom }}</a>
                                            <div class="d-block">
                                                @foreach($e->user->roles as $role) @if($role->nom == "Administrateur")
                                                <li class="role-admin">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Enseignant")
                                                <li class="role-prof">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Gérant club")
                                                <li class="role-club">{{$role->nom}}</li>
                                                @endif @if($role->nom == "Etudiant")
                                                <li class="role-etud">{{$role->nom}}</li>
                                                @endif @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach @endif

                    </div>
                    {{$events->links('vendor.pagination.bootstrap-4')}}

                </div>
            </div>
    @endsection