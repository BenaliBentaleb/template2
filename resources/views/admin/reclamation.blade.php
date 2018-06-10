
            @extends('admin.index') @section('admin')
           

            <div class="my-3 my-md-4">
                <div class="container">
                    @if(count($reclamations) == 0 )
                    <div class="col-md-12 mt-9 ">
                        <div class="col-md-6  mx-auto alert alert-icon alert-primary" role="alert">
                            <i class="fe fe-bell" aria-hidden="true"></i> Pas de Reclamation
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Réclamations</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter users-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="w-1">Id</th>
                                            <th class="w-1"></th>
                                            <th>Nom</th>
                                            <th>Titre</th>
                                            <th>Contenu</th>
                                            <th>Etat</th>
                                            <th>Type</th>
                                            <th>Créer à</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reclamations as $r)
                                        <tr>
                                            <td>
                                                <span class="text-muted">{{$r->id}}</span>
                                            </td>
                                            <td>
                                                <span class="avatar" style="background-image: url({{asset($r->user->profile->photo_profile)}})"></span>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.profile',['id' => $r->user->id]) }}" class="text-inherit">{{$r->user->nom}}</a>
                                            </td>
                                            <td>
                                                {{str_limit($r->title,30)}}
                                            </td>
                                            <td>
                                                {{str_limit($r->reclamation,30)}}
                                            </td>
                                            <td>
                                                @if($r->status == 0)
                                                <span class="badge badge-warning">En attente</span>
                                                @elseif($r->status == 1)
                                                <span class="badge badge-success">Terminé</span>
                                                @elseif($r->status == 2)
                                                <span class="badge badge-danger">Rejeté</span>
                                                @endif




                                            </td>
                                            <td>
                                                {{ $r->Type }}
                                            </td>

                                            <td>
                                                {{$r->created_at->toFormattedDateString()}}
                                            </td>


                                            <td>
                                                @if($r->status == 0) {{-- Status == En attente --}}
                                                <a href="{{ route('admin.reclamation.repondre',['id' => $r->id]) }}" class="btn btn-secondary btn-sm">Répondre</a>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="item-action dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{ route('admin.reclamation.repondre',['id' => $r->id]) }}" class="dropdown-item">
                                                                    <i class="dropdown-icon fe fe-eye"></i> Voire réclamation </a>
                                                        <a href="{{ route('admin.reclamation.terminer',['id' => $r->id]) }}" class="dropdown-item">
                                                            <i class="dropdown-icon fe fe-check-circle"></i> Marquer comme terminé </a>
                                                        <a href="{{ route('admin.reclamation.rejeter',['id' => $r->id]) }}" class="dropdown-item">
                                                            <i class="dropdown-icon fe fe-alert-octagon"></i> Marquer comme rejeter </a>
                                                       

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
                        {{$reclamations->links('vendor.pagination.bootstrap-4')}}

                    </div>


                    @endif

                </div>
            </div>
       @endsection
           