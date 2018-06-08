<!--
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>NTICien - Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>-->


@extends('admin.index') @section('admin')

<div class="my-3 my-md-4">
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Utilisateurs</h3>

                    <a href="{{route('admin.form.ajouter.utilisateur')}}" class="btn btn-azure ml-auto">Ajouter utilisateur</a>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter users-table text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">Id</th>
                                <th class="w-1"></th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Créer à</th>
                                <th>Rôles</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <span class="text-muted">{{$user->id}}</span>
                                </td>
                                <td>
                                    <span class="avatar" style="background-image: url({{$user->profile->photo_profile}})"></span>
                                </td>
                                <td>
                                    <a href="{{route('user.profile',['id'=>$user->id])}}" class="text-inherit">{{$user->nom}}</a>
                                </td>
                                <td>
                                    {{$user->prenom}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->created_at->toFormattedDateString()}}
                                </td>
                                <td>
                                    @foreach($user->roles as $role) @if($role->nom =="Administrateur")
                                    <span class="role-admin">Administrateur</span>
                                    @endif @if($role->nom =="Enseignant")
                                    <span class="role-prof">Enseignant</span>
                                    @endif @if($role->nom =="Gerant Club")
                                    <span class="role-club">Gérant Club</span>
                                    @endif @if($role->nom =="Etudiant")
                                    <span class="role-etudiant">Etudiant</span>
                                    @endif @endforeach
                                </td>

                                <td class="text-right">

                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                <i class="dropdown-icon fe fe-edit-3"></i> Modifie rôles </a>
                                            <a href="{{route('user.profile',['id'=>$user->id])}}" class="dropdown-item">
                                                <i class="dropdown-icon fe fe-user"></i> Voire profile </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="icon" href="{{route('admin.form.modifier.utilisateur',['id'=>$user->id])}}">
                                        <i class="fe fe-edit"></i>
                                    </a>
                                </td>
                                <td class="w-0">
                                    @if($user->id != Auth::id())
                                    <a class="icon" id="delete-btn" href="{{route('admin.utilisateur.delete',['id'=>$user->id])}}">
                                        <i class="fe fe-trash text-danger" id="delete"></i>
                                    </a>
                                    @endif

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


            {{$users->links('vendor.pagination.bootstrap-4')}}

        </div>

    </div>
</div>

@endsection
