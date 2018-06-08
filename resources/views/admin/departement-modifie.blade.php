@extends('admin.index') @section('admin')
           
         

            <div class="my-3 my-md-4">
                <div class="container">
                    <div class="col-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Modifie département</h3>

                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.departement.edit',['id' => $departement->id ])}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" required value="{{ $departement->nom }}">
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