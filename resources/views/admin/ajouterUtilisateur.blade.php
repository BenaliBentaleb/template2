
@extends('admin.index') @section('admin')


            <div class="container d-flex justify-content-center mt-5">
                <div class="col-md-6 ">
                    <form  action="{{route('admin.ajouter.utilisateur')}}" method="POST" class="card">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h3 class="card-title">Ajouter utilisateur</h3>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}"   required>
                                @if ($errors->has('nom'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prenom</label>
                                <input type="text" class="form-control" name="prenom" required  value="{{ old('prenom') }}">
                                @if ($errors->has('prenom'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirmer mot de passe</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Rôles </div>
                                <div>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="administrateur" value="Administrateur">
                                        <span class="custom-control-label">Administrateur</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ens" type="checkbox"  class="custom-control-input " name="enseignant" value="Enseignant" onClick="uncheck(1);">
                                        <span class="custom-control-label">Enseignant</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="etud" type="checkbox" class="custom-control-input " name="etudiant" value="Etudiant" onClick="uncheck(2);">
                                        <span class="custom-control-label">Étudiant</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="gclub" value="Gerant Club">
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