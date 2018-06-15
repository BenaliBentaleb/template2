
@extends('layouts.app')
 @section('content')

 <div class="col-md-9 col-md-offset-0">
    <div class="reclamation-container">
        <div class="row register-form">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal custom-form" method="POST" action="{{ route('user.store.reclamation')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <h1 class="text-capitalize">Déposer une réclamation</h1>
                    <p class="reclamation-note">
                        <span>Note :</span>Vos informations ( nom, prénom, formation et groupe ) dans votre profile doivent
                        être juste.</p>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Titre de réclamation</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text"  name="title" required="" autofocus="">
                            @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                             

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Type de réclamation</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <select class="form-control reclamation-type" name="type" required="">
                                <option value="Reclamation generale" selected="">Réclamation générale</option>
                                <option value="Faute de calcule">Faute de calcule</option>
                                <option value="Suggestion">Suggestion</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Contenu</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <textarea class="form-control reclamation"  name="reclamation"  required="" placeholder="Donnez tous le details possible pour bien régler votre réclamation .."
                                autofocus=""></textarea>
                                @if ($errors->has('reclamation'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('reclamation') }}</strong>
                                </span>
                                @endif
                                
                        </div>

                        
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-default submit-button" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection