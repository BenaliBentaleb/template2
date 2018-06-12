@extends('layouts.app') @section('content')

<div class="col-md-9 memoire-container">
    <div class="reclamation-container">
        <div class="row register-form">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal custom-form"  method="POST" action="{{ route('store.memoire')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <h1 class="text-capitalize">Ajouter un mémoire</h1>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Titre du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>

                            
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text"  name="titre"  value="{{old('titre')}}"  required="" autofocus="">
                            @if ($errors->has('titre'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('titre') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                    </div>
                  
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Type du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column" style="margin-bottom:15px;">
                            <select class="form-control reclamation-type" name="type" required=""  id="memoiretype">
                                <option  value="" selected disabled>Type</option>
                                <option value="licence">Licence</option>
                                <option value="master">Master</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column">
                            <select class="form-control reclamation-type" name="formation_id"  required="" id="memoireannee">
                             <!--   @foreach($formations_licence as $formation)
                                <option value='{{$formation->id}}' >{{ $formation->nom }}</option>
                                @endforeach

                                @foreach($formations_master as $formation)
                                <option value='{{$formation->id}}'>{{ $formation->nom }}</option>
                                @endforeach-->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">L'encadreur</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-4 input-column" style="margin-bottom:15px;">
                            <input class="form-control" type="text"   name="encadreur"  value="{{old('encadreur')}}" required="">
                            @if ($errors->has('encadreur'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('encadreur') }}</strong>
                                                </span>
                                                @endif
                        </div>
                        <div class="col-sm-2 input-column" style="padding-right:10px;">
                            <input class="form-control" type="number" required="" name="date" value="{{old('date')}}"  placeholder="Année" maxlength="4" minlength="4"
                                pattern="[0-9][0-9][0-9][0-9]" style="width:80%;      display: inline-block;">
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                            @if ($errors->has('date'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 1</label>
                                <span style="color:rgb(248,0,0);">&nbsp;*</span>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" value="{{old('etudiant1')}}" name="etudiant1"   required="">
                                @if ($errors->has('etudiant1'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('etudiant1') }}</strong>
                                                </span>
                                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 2</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text"  placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 3</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text"  placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 4</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text"  placeholder="/">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4 input-column">
                            <input type="file"  value="{{old('fichier')}}"  name="fichier"  accept=".pdf" class="form-control" required>
                            @if ($errors->has('fichier'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('fichier') }}</strong>
                            </span>
                            @endif
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-default submit-button"  type="submit" style="margin-bottom:0;margin-top:30px;">Sauvgarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    

@endsection