
@extends('admin.index') @section('admin')


<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-6 ">
        <form  action="{{route('admin.modifier.utilisateur',['id'=>$user->id])}}" method="POST" class="card">
            {{csrf_field()}}
            <div class="card-header">
                <h3 class="card-title">Modifier le(s)  Role(s) de {{$user->nom}}  {{$user->prenom}} </h3>

            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{$user->nom}}" readonly >
                    
                </div>
                <div class="form-group">
                    <label class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="prenom"  value="{{$user->prenom}}" readonly >
                  
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"  value="{{$user->email}}" readonly  >
                 
                </div>


              
                <div class="form-group">
                    <div class="form-label">Rôles </div>
                    <div>
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input"  value="Administrateur"  @if($user->check_if_user_have_this_role("Administrateur")) checked  @endif name="administrateur"  />
                            <span class="custom-control-label">Administrateur</span>
                        </label>
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input id="ens" type="checkbox" class="custom-control-input " name="enseignant" value="Enseignant"  @if($user->check_if_user_have_this_role("Enseignant")) checked   @endif   onClick="uncheck(1);"/>
                            <span class="custom-control-label">Enseignant</span>
                        </label>
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input id="etud" type="checkbox" class="custom-control-input " name="etudiant" value="Etudiant" @if($user->check_if_user_have_this_role("Etudiant")) checked   @endif  onClick="uncheck(2);"/>
                            <span class="custom-control-label">Étudiant</span>
                        </label>
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="gclub"  value="Gerant Club"  @if($user->check_if_user_have_this_role("Gerant Club")) checked  @endif />
                            <span class="custom-control-label">Gérant club</span>
                        </label>
                        
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <div class="btn-list text-right">
                    <button type="submit"  class="btn btn-primary">Sauvgarder</button>
                    <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</div>




@endsection