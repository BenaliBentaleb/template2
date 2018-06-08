@extends('admin.index') @section('admin')
            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-9 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Departements</h3>

                                <a href="{{route('admin.departement.ajout')}}" class="btn btn-azure ml-auto">Ajouter departement</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter users-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="w-1">Id</th>
                                            <th>Nom</th>
                                            <th>Créer à</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($departements as $departement)
                                        <tr>
                                            <td>
                                                <span>{{$departement->id}}</span>
                                            </td>

                                            <td>
                                                <span>{{$departement->nom}}</span>
                                            </td>

                                            <td>
                                                {{$departement->created_at->toFormattedDateString()}}
                                            </td>

                                            <td class="text-right">
                                                <a class="icon" href="{{route('admin.departement.modifie',['id'=>$departement->id])}}">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            </td>
                                            <td class="w-0">
                                                <a class="icon" id="delete-departement"  href="{{route('admin.departement.delete',['id'=>$departement->id])}}">
                                                    <i class="fe fe-trash text-danger" id="delete"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                      
                        {{$departements->links('vendor.pagination.bootstrap-4')}}

                    </div>

                </div>
            </div>

@endsection