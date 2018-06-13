@extends('layouts.app') @section('content')
<div class="col-md-9">
    <form action="{{ route('evenement.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="card event">
            <div class="text-center">
                <h2 class="text-capitalize " style="display:inline-block;border-bottom: 2px solid rgb(108, 174, 224);padding-bottom:12px;margin-bottom:20px">Ajouter évenement</h2>
            </div>
            <div class="card-body" style="padding:15px;">

                <div class="row">

                    <div class="col-md-8 form-group">
                        <label>Titre de l'évenement</label>
                        <input type="text" name="titre"  {{old('titre')}} required="" class="form-control" placeholder="Titre ..">
                        @if ($errors->has('titre'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('titre') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="col-md-4 form-group">
                        <label>Publier en tant que</label>
                        <select class="form-control" required="" name="event_role" style="margin-right:0;">
                            @foreach(Auth::user()->roles as $role) @if($role->nom == "Administrateur")
                            <option value="Administrateur">{{$role->nom}} </option>
                            @elseif($role->nom == "Enseignant")
                            <option value="Enseignant">{{$role->nom}} </option>
                            @elseif($role->nom == "Gérant club")
                            <option value="Gérant club">{{$role->nom}} </option>
                            @endif @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group ">
                        <label class="form-label">Date debut</label>
                        <input type="date" name="debut" {{old('debut')}} class="form-control" required="">
                        @if ($errors->has('debut'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('debut') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-md-4 form-group ">
                        <label class="form-label">Date fin</label>
                        <input type="date" name="fin"  {{old('fin')}} class="form-control" required="">
                        @if ($errors->has('fin'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('fin') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Formation</label>
                        <select name="formation_id" class="form-control custom-select" required="">
                            <optgroup label="NTICien">
                                <option value="" selected="">Général - NTICien</option>
                            </optgroup>
                            @foreach($departement as $dep)
                            <optgroup label="Déprartement : {{ $dep->nom }}">
                                @foreach($dep->formation as $formation)
                                @if(old('formation_id') == $formation->id )
                                <option value="{{ $formation->id }}" selected>{{ $formation->nom }}</option>
                                @else
                                <option value="{{ $formation->id }}"
                                    @if($formation_clicked != "NTICIEN") 
                                    @if($formation->id == $formation_clicked->id )
                                    selected 
                                    @endif 
                                    @endif>{{ $formation->nom }}</option>
                                @endif
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Description brève</label>
                        <span class="pull-right">
                            <span id="short-content-size">0</span>/150</span>
                        <textarea id="short-content" onkeyup="countChar(this)" required=""  class="form-control" name="description" rows="3" placeholder="Content.."
                            maxlength="150">{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif

                        <script type="text/javascript">
                            function countChar(val) {
                                var len = val.value.length;
                                if (len >= 150) {
                                    val.value = val.value.substring(0, 150);
                                } else {
                                    $('#short-content-size').text(150 - len);
                                }
                            };
                        </script>

                    </div>
                    <div class=" col-md-12 form-group">
                        <label class="form-label">Description de l'évenement
                            <span class="form-label-small"></span>
                        </label>
                    <textarea id="event-content" name="contenu">{{old('contenu')}}</textarea>
                        @if ($errors->has('contenu'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('contenu') }}</strong>
                        </span>
                        @endif

                        <!-- Event content here! -->

                    </div>

                </div>


            </div>
            <div class="card-footer">
                <div class="btn-list text-right">
                    <input type="submit" class="btn btn-primary" value="Sauvgarder">
                    <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                </div>
            </div>


        </div>
    </form>
</div>
@endsection