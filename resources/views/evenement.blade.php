@extends('layouts.app') @section('content')


<div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                @foreach(Auth::user()->roles as $role) 
                @if($role->nom == "Administrateur" || $role->nom == "Enseignant" || $role->nom == "Gérant club" )
                    <div class="col-md-12">
                        <a href="{{route('evenement.ajouter',['formation' => 'NTICIEN'])}}" class="btn btn-success pull-right ">Ajouter un évènement</a>
                    </div>
                    
                    @break 
                    @endif 
                @endforeach {{-- {{ dd($events)}} --}} 
                <h4 class="text-center">Les évènements du :</h4>
                <h4  class="text-center"><strong>NTICient - Général</strong></h4>
                @if(count($nticien_events) == 0 || \App\Event::AllArchived($nticien_events))
                <div class="row" style="margin-top:30px;">
                    <div class="alert alert-warning text-center col-md-6 col-md-offset-3" role="alert">Pas d'évenements partagé pour le moment</div>
                </div>
                @else 
                @foreach($nticien_events as $ev)
                    @if($ev->is_archived == 0)
                    <div class="evenement 
                    @if($ev->event_role =='Administrateur' )
                        admin-bar
                    @elseif($ev->event_role =='Enseignant')
                        prof-bar
                    @else
                        club-bar
                    @endif
                    ">
                    <a href="#event-collapse{{$ev->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$ev->id}}"
                        style="text-decoration:none;">
                        <h3 class="text-info even-title @if(Auth::id() == $ev->user_id || Auth::user()->isAdmin()) pull-left @endif">{{$ev->titre}}</h3>
                        @if(Auth::id() == $ev->user_id || Auth::user()->isAdmin())
                        <div class="pull-right">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe fe-more-vertical" style="padding:5px;font-size:15px;color:#4e4e4e"></i>
                                </a>
                                <ul class="list-unstyled dropdown-menu dropdown-menu-right" >
                                    
                                    <li>
                                        <a href="{{route('user.evenement.modifie',['id' => $ev->id ])}}">
                                            <i class="fe fe-edit"></i>
                                            <span>&nbsp; Modifier</span>
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a id="supprimer-btn" href="{{route('user.evenement.delete',['id' => $ev->id ])}}">
                                            <i class="fe fe-trash"></i>
                                            <span>&nbsp; Supprimer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.evenement.archiver',['id' => $ev->id ])}}">
                                            <i class="fe fe-eye-off"></i>
                                            <span>&nbsp; Archiver</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @endif
                    </a>
                    <div id="event-collapse{{$ev->id}}" class="collapse in">
                        <p>{{ $ev->description}}
                            <br>
                        </p>
                        <p>
                            {!! $ev->contenu !!}
                                
                        </p>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:16px;"></i>
                            <span>&nbsp;Date debut :&nbsp;</span>
                            <span>{{ $ev->debut}}</span>
                        </div>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:17px;"></i>
                            <span>&nbsp;Date fin :&nbsp;</span>
                            <span>{{ $ev->fin }}</span>
                        </div>
                        {{-- <span class="publisher">Publier par :</span> --}}
                        <div style="margin-top:10px">
                            <a href="{{route('user.profile',['id'=>$ev->user_id])}}">
                                <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($ev->user->profile->photo_profile)}});">
                            </a>
                            <ul class="list-unstyled publisher-info">
                                <li style="display: block;margin-left: 40px;">
                                    <a href="{{route('user.profile',['id'=>$ev->user_id])}}">
                                        <strong>{{$ev->user->nom . ' ' . $ev->user->prenom }}</strong>
                                    </a>
                                </li>
                                <li>
                                    @foreach($ev->user->roles as $role) @if($role->nom == "Administrateur")
                                    <span class="role-admin">{{$role->nom}}</span>
                                    @elseif($role->nom == "Enseignant")
                                    <span class="role-prof">{{$role->nom}}</span>
                                    @elseif($role->nom == "Gérant club")
                                    <span class="role-club">{{$role->nom}}</span>
                                    @elseif($role->nom =="Etudiant")
                                    <span class="role-etud"> {{$role->nom}}</span>
                                    @endif @endforeach

                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    @endif
                @endforeach
                   
                @endif




                <h3 class="text-center" style="margin:20px 0;">Les évènements des autre départements</h3>
                
                @if(count($events) == 0)
                <div class="row" style="margin-top:30px;">
                    <div class="alert alert-warning text-center col-md-6 col-md-offset-3" role="alert">Pas d'évenements partagé pour le moment</div>
                </div>                
                @else 
                
                @foreach($events as  $key =>$events)
                @if(!\App\Event::AllArchived($events))
                    @if(count($events))
                    <h4  class="">Événement du : <strong>{{ $key }}</strong></h4>
                        @foreach($events as $ev)
                        
                            @if($ev->is_archived == 0)
                            <div class="evenement 
                            @if($ev->event_role =='Administrateur' )
                                admin-bar
                            @elseif($ev->event_role =='Enseignant')
                                prof-bar
                            @else
                                club-bar
                            @endif
                            ">
                            <a href="#event-collapse{{$ev->id}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe{{$ev->id}}"
                                style="text-decoration:none;">
                                <h3 class="text-info even-title @if(Auth::id() == $ev->user_id || Auth::user()->isAdmin()) pull-left @endif">{{$ev->titre}}</h3>
                                @if(Auth::id() == $ev->user_id || Auth::user()->isAdmin())
                                <div class="pull-right">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical" style="padding:5px;font-size:15px;color:#4e4e4e"></i>
                                        </a>
                                        <ul class="list-unstyled dropdown-menu dropdown-menu-right" >
                                            
                                            <li>
                                                <a href="{{route('user.evenement.modifie',['id' => $ev->id ])}}">
                                                    <i class="fe fe-edit"></i>
                                                    <span>&nbsp; Modifier</span>
                                                </a>
                                            </li>
                                        
                                            <li>
                                                <a id="supprimer-btn" href="{{route('user.evenement.delete',['id' => $ev->id ])}}">
                                                    <i class="fe fe-trash"></i>
                                                    <span>&nbsp; Supprimer</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a id="signaler-btn" href="{{route('user.evenement.archiver',['id' => $ev->id ])}}">
                                                    <i class="fe fe-eye-off"></i>
                                                    <span>&nbsp; Archiver</span>
                                                </a>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @endif
                            </a>
                            <div id="event-collapse{{$ev->id}}" class="collapse in">
                                <p>{{ $ev->description}}
                                    <br>
                                </p>
                                <p>
                                    {!! $ev->contenu !!}
                                        
                                </p>
                                <div style="font-size:15px;">
                                    <i class="icon-calendar" style="font-size:16px;"></i>
                                    <span>&nbsp;Date debut :&nbsp;</span>
                                    <span>{{ $ev->debut}}</span>
                                </div>
                                <div style="font-size:15px;">
                                    <i class="icon-calendar" style="font-size:17px;"></i>
                                    <span>&nbsp;Date fin :&nbsp;</span>
                                    <span>{{ $ev->fin }}</span>
                                </div>
                                {{-- <span class="publisher">Publier par :</span> --}}
                                <div style="margin-top:10px">
                                    <a href="{{route('user.profile',['id'=>$ev->user_id])}}">
                                        <img class="publisher-image avatar avatar-xl" style="background-image:url({{asset($ev->user->profile->photo_profile)}});">
                                    </a>
                                    <ul class="list-unstyled publisher-info">
                                        <li style="display: block;margin-left: 40px;">
                                            <a href="{{route('user.profile',['id'=>$ev->user_id])}}">
                                                <strong>{{$ev->user->nom . ' ' . $ev->user->prenom }}</strong>
                                            </a>
                                        </li>
                                        <li>
                                            @foreach($ev->user->roles as $role) @if($role->nom == "Administrateur")
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
                            @endif
                        @endforeach
                    @endif
                @endif
                @endforeach

                @endif
                    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        
    var deleterEvent = {
        linkSelector: "a#delete-event",
        init: function () {
            $(this.linkSelector).on('click', {
                self: this
            }, this.handleClick);
        },
        handleClick: function (event) {
            event.preventDefault();
            var self = event.data.self;
            var link = $(this);
            swal({
                    title: "Etes-Vous sur ?",
                    text: "Cet évènement sera supprimé d'une manière définitive",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        /*  swal("Poof! Your imaginary file has been deleted!", {
                              icon: "success",
                          });*/
                        window.location = link.attr('href');
                    } 
                });
        },
    };
    deleterEvent.init();

    $(document).ready(function () {
        var mixer = mixitup("#events", {
            selectors: {
                control: '[data-mixitup-control]'
            }
        });

        $('.shuffle button').click(function () {
            $(this).addClass('selected').siblings().removeClass('selected');
        });

    });
</script>
@endsection