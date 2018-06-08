

@extends('admin.index') @section('admin')
           
            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-9 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Formations</h3>

                                <a href="{{route('admin.formation.ajout')}}" class="btn btn-azure ml-auto">Ajouter formation</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter users-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="w-1">Id</th>
                                            <th>Nom</th>
                                            <th>Type</th>
                                            <th>Departement</th>
                                            <th>Créer à</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($formations as $formation)
                                        <tr>
                                            <td>
                                                <span>{{$formation->id}}</span>
                                            </td>

                                            <td>
                                                <span>{{$formation->nom}}</span>
                                            </td>

                                            <td>
                                                <span>{{$formation->type}}</span>
                                            </td>
                                            <td>
                                                <span>{{ $formation->departement->nom}}</span>
                                            </td>
                                            <td>
                                                {{$formation->created_at->toFormattedDateString()}}
                                            </td>

                                            <td class="text-right">
                                                <a class="icon" href="{{route('admin.formation.modifie',['id'=>$formation->id])}}">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            </td>
                                            <td class="w-0">
                                                <a class="icon" id="delete-btn" href="{{route('admin.formation.delete',['id'=>$formation->id])}}">
                                                    <i class="fe fe-trash text-danger" id="delete"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                      
                        {{$formations->links('vendor.pagination.bootstrap-4')}}

                    </div>

                </div>
            </div>
   @endsection
