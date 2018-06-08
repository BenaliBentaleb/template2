
@extends('admin.index') @section('admin')

            <div class="my-3 my-md-4">
                <div class="container">

                    <div class="page-header">
                        <h1 class="page-title ">
                            Les mémoires partagés
                        </h1>
                        <div class="ml-auto shuffle">
                            <button class="btn btn-secondary mixitup-control-active" type="button" data-mixitup-control="" data-filter="all">Tous</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control="" data-filter=".licence">Licence</button>
                            <button class="btn btn-secondary" type="button" data-mixitup-control="" data-filter=".master">Master</button>
                        </div>
                        <a href="{{ route('admin.memoire.ajout')}}" class="btn btn-success ml-5">Ajouter memoire</a>
                    </div>

                    <div class="row row-cards row-deck " id="memoires">
                        @if(count($memoires) == 0)
                        <div class="col-md-12 mb-4 ">
                            <div class="col-md-6 pb-6 mx-auto alert alert-icon alert-primary" role="alert">
                                <i class="fe fe-bell mr-2" aria-hidden="true"></i> Pas de mémoires partagés
                            </div>
                        </div>
                        @else @foreach($memoires as $memoire)
                        <div class="col-lg-4 mix @if($memoire->type == 'licence') licence @else master @endif">
                            <div class="card">
                                <div class="card-status card-status-left @if($memoire->type == 'licence') bg-licence @else bg-master @endif "></div>
                                <div class="card-body d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4>
                                                {{ $memoire->titre }}
                                            </h4>
                                            <h6> 
                                                Memoire de  {{ $memoire->formation->nom}} - {{ $memoire->date }}
                                            </h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card-options">

                                                <a class="icon" href="{{ route('admin.memoire.modifie',['id' => $memoire->id ])}}" title="" data-toggle="tooltip" data-original-title="Modifier">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                <a class="icon" id="delete-memoire" href="{{ route('admin.memoire.delete',['id' => $memoire->id ]) }}" title="" data-toggle="tooltip" data-original-title="Supprimer">
                                                    <i class="fe fe-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <span>
                                        <b>Réaliser par :</b>
                                    </span>
                                    <div>
                                        <ul>
                                            @if($memoire->etudiant1)
                                            <li>
                                                {{ $memoire->etudiant1}}
                                            </li>
                                            @endif @if($memoire->etudiant2)
                                            <li>
                                                {{ $memoire->etudiant2}}
                                            </li>
                                            @endif @if($memoire->etudiant3)
                                            <li>
                                                {{ $memoire->etudiant3}}
                                            </li>
                                            @endif @if($memoire->etudiant4)
                                            <li>
                                                {{ $memoire->etudiant4}}
                                            </li>
                                            @endif

                                        </ul>
                                        @if($memoire->encadreur)
                                        <span class="d-block">
                                            <b>Encadrer par :</b>
                                        </span>
                                        <span> {{ $memoire->encadreur }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="avatar avatar-md mr-3" style="background-image: url({{ asset($memoire->user->profile->photo_profile)}})"></div>
                                        <div>
                                            <a href="./profile.html" class="text-default">{{ $memoire->user->nom . " " .$memoire->user->prenom }}</a>
                                            <small class="d-block text-muted">{{ $memoire->created_at->diffForHumans()}}</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach @endif



                    </div>

                    {{$memoires->links('vendor.pagination.bootstrap-4')}}

                </div>
            </div>
      @endsection