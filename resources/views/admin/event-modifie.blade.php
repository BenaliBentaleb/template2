
            @extends('admin.index') @section('admin')
           

            <div class="container d-flex justify-content-center mt-5">
                <div class="col-md-9 ">
                    <form action="{{ route('admin.event.edit',['id' => $event->id ]) }}" method="POST">
                            {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Modifier l'évènement: {{ $event->titre }}</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-8 form-group">
                                        <label>Titre de l'évenement</label>
                                        <input type="text" name="titre" required class="form-control" value="{{ $event->titre }}">

                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Publier en tant que</label>
                                        <select class="form-control" required name="event_role" style="margin-right:0;">
                                            @foreach($event->user->roles as $role) 
                                                @if($role->nom == "Administrateur")
                                                    <option value="Administrateur" @if($event->event_role == $role->nom) selected @endif>{{$role->nom}} </option>
                                                @elseif($role->nom == "Enseignant")
                                                    <option value="Enseignant" @if($event->event_role == $role->nom) selected @endif>{{$role->nom}} </option>
                                                @elseif($role->nom == "Gérant club")
                                                    <option value="Gérant club" @if($event->event_role == $role->nom) selected @endif>{{$role->nom}} </option>
                                                @endif 
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group ">
                                        <label class="form-label">Date debut</label>
                                        <input type="date" name="debut" value="{{$event->debut}}" class="form-control">
                                    </div>

                                    <div class="col-md-4 form-group ">
                                        <label class="form-label">Date fin</label>
                                        <input type="date" name="fin" value="{{$event->fin}}" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-label">Formation</label>
                                        <select name="formation_id" class="form-control custom-select" required>
                                            <optgroup label="NTICien">
                                                <option value="" @if($event->formation_id == "") selected @endif >Général - NTICien</option>
                                            </optgroup>
                                            @foreach($departements as $departement)
                                                <optgroup label="Déprartement : {{ $departement->nom }}">
                                                    @foreach($departement->formation as $formation)
                                                        <option value="{{ $formation->id }}" @if($event->formation_id == $formation->id ) selected @endif>{{ $formation->nom }}</option>
                                                    @endforeach                                            
                                                </optgroup>
                                            @endforeach
                                        </select>      
                                    </div>

                                    <div class=" col-md-12 form-group">
                                        <label class="form-label">Brève description
                                            <span class="form-label-small">
                                                <span id="short-content-size">0</span>/150</span>
                                        </label>
                                        <textarea id="short-content" onkeyup="countChar(this)" required class="form-control" name="description" rows="3" placeholder="Content.."
                                            maxlength="150">{{$event->description}}</textarea>

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
                                        <textarea id="event-content" name="contenu">
                                            {{$event->contenu}}
                                        </textarea>

                                        <!-- Event content here! -->

                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {

                                            // initialize summernote
                                            $('#event-content').summernote({
                                                height: 100
                                            });
                                            // and set code
                                            $('#event-content').summernote('code', contents);
                                        });
                                    </script>
                                </div>


                            </div>
                            <div class="card-footer">
                                <div class="btn-list text-right">
                                    <input type="submit" class="btn btn-primary" value="Sauvgarder">
                                    <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                                </div>
                            </div>
                    </form>

                    </div>

                </div>
            </div>
        </div>
  @endsection