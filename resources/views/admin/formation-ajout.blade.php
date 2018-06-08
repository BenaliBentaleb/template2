@extends('admin.index') @section('admin')
           

            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter formation</h3>

                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.formation.store')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="nom" required>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-label">Departement</label>
                                            <select name="departement" class="form-control custom-select">
                                                
                                                @foreach($departements as $departement)
                                                    <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    <div class="form-group">
                                        <div class="form-label">Type de formation</div>
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="type" value="tronc-commun" checked>
                                                <span class="custom-control-label">Tronc commun</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="type" value="licence">
                                                <span class="custom-control-label">Licence</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" name="type" value="master">
                                                <span class="custom-control-label">Master</span>
                                            </label>
                                        </div>
                                    </div>


                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <button type="submit" class="btn btn-primary">Sauvgarder</button>
                                    <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                                </div>
                            </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
     @endsection