
@extends('admin.index') @section('admin')





<div class="my-3 my-md-4">
    <div class="container">

        <div class="page-header">
            <h1 class="page-title text-danger">
                Les publications signalées
            </h1>
            <a class="btn btn-danger ml-auto" data-toggle="collapse" href="#pubsignalees" role="button" aria-expanded="false" aria-controls="pub-signalees">
                Masquer
            </a>
        </div>


        <div class="row row-cards row-deck collapse show" id="pubsignalees">
            @if(count($pubs_signaler)) @foreach($pubs_signaler as $pub_signaler)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-status bg-danger"></div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>
                                    <a href="#">{{$pub_signaler->title}}</a>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <div class="card-options">

                                    <a class="icon" id="delete-publication" href="{{route('publication.unsignaler',['id'=>$pub_signaler->id])}}" title="" data-toggle="tooltip" data-original-title="retourner en page d'acceuil">
                                        <i class="fe fe-alert-circle text-green"></i>
                                    </a>
                                    <a class="icon" id="delete-signaler-publication" href="{{route('publication.destroy',['id'=>$pub_signaler->id])}}" title="" data-toggle="tooltip" data-original-title="Supprimer">
                                        <i class="fe fe-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="text-muted">
                            {!! $pub_signaler->contenu !!} </div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3" style="background-image: url({{$pub_signaler->user->profile->photo_profile}})"></div>
                            <div>
                                <a href="{{route('user.profile',['id'=>$pub_signaler->user->id])}}" class="text-default">{{$pub_signaler->user->nom}} {{$pub_signaler->user->prenom}}</a>
                                <small class="d-block text-muted">{{$pub_signaler->created_at->diffForHumans()}}</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach @else
           

            <div class="col-md-6 mx-auto alert alert-icon alert-primary" role="alert">
                <i class="fe fe-bell mr-2" aria-hidden="true"></i> Pas de publications signalées
            </div>
            @endif
        </div>




        <div class="page-header">
            <h1 class="page-title ">
                Les publications partagées
            </h1>
            <div class="ml-auto shuffle">
                <button class="btn btn-secondary" type="button" data-mixitup-control data-filter="all">Tous</button>
                <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".Status">Status</button>
                <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".Tutorial">Tutoriels</button>
                <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".FAQ">FAQs</button>
                <button class="btn btn-secondary" type="button" data-mixitup-control data-filter=".sondage">Sondages</button>
            </div>
        </div>
        <div class="row row-cards row-deck" id="publications">
            @foreach($publications as $publication)
            <div class="col-lg-4 mix {{$publication->type}}">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>
                                    <a href="#">{{$publication->title}}</a>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <div class="card-options">

                                   
                                    <a class="icon" id="delete-publication" href="{{route('publication.destroy',['id'=>$publication->id])}}" title="" data-toggle="tooltip" data-original-title="Supprimer">
                                        <i class="fe fe-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="text-muted">
                            {!! $publication->contenu !!} </div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3" style="background-image: url({{$publication->user->profile->photo_profile}})"></div>
                            <div>
                                <a href="{{route('user.profile',['id'=>$publication->user->id])}}" class="text-default">{{$publication->user->nom}} {{$publication->user->prenom}}</a>
                                <small class="d-block text-muted">{{$publication->created_at->diffForHumans()}}</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach






        </div>
    
        {{$publications->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
@endsection