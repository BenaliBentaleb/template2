 @extends('layouts.app') @section('content')

<div class="col-md-9 col-md-offset-0">
    <div class="reclamation-container">
        <div class="row register-form">
            <div class="col-md-10 col-md-offset-1">
                    <div class="row" class="padding:0;margin:0;">
                        <div class="col-md-10" style=>
                                <h3 style="display:inline-block;margin-bottom:0px;margin-top:6px;">Les réclamations précédentes</h3>
                        </div>
                            <div class="col-md-2"  style="margin-bottom:30px;" >
                                <a class="btn btn-primary btn-block" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Afficher
                                </a>
                            </div>
                    </div>
               
                
                <div class="collapse" id="collapseExample">
                    @if(count($reclamations) == 0)

                    <div role="alert" class="alert alert-warning" style="margin-bottom:30px">
                        Vous n'avez pas des réclamations précédentes 
                    </div>
                    @else
                    <table class="table table-hover reclamation-table" style="margin-bottom:30px;">
                        <thead>
                          <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Type</th>
                            <th>Etat</th>
                            <th>Créer à</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($reclamations as $r)
                        <tr>
                            <td>{{str_limit($r->title,10)}}</td>
                            <td> {{str_limit($r->reclamation,20)}}</td>
                            <td>{{ $r->Type }}</td>
                            <td>
                                @if($r->status == 0)
                                    <span class="badge badge-warning">En attente</span>
                                    @elseif($r->status == 1)
                                    <span class="badge badge-success">Terminé</span>
                                    @elseif($r->status == 2)
                                    <span class="badge badge-danger">Rejeté</span>
                                @endif
                            </td>
                            <td>
                                {{$r->created_at->toFormattedDateString()}}
                            </td>
                            <td>
                                @if($r->status == 0) {{-- Status == En attente --}}
                                    <a href="{{ route('user.reclamation.repondre',['id' => $r->id]) }}" class="btn btn-secondary btn-sm">Répondre</a>
                                @else
                                    <a href="{{ route('user.reclamation.repondre',['id' => $r->id]) }}" class="btn btn-secondary btn-sm">Voire</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                          
                        </tbody>
                      </table>
                      @endif
                </div>
            </div>



<!-- 
            <div class="col-md-10 col-md-offset-1" >
                    <h3 style="display: inline-block; margin-bottom: 0px; margin-top: 6px;">Les réclamations précédentes&nbsp;</h3>
            </div> -->
                
            
           
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal custom-form" method="POST" action="{{ route('user.store.reclamation')}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <h1 class="text-capitalize">Déposer une réclamation</h1>
                    <p class="reclamation-note">
                        <span>Note :</span>Vos informations ( nom, prénom, formation ) dans votre profile doivent être
                        juste.</p>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Titre de réclamation</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" name="title" required="" autofocus=""> @if ($errors->has('title'))
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
                                <option value="Changer le rôle">Changer le rôle</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Contenu</label>
                        </div>
                        <div class="col-sm-6 input-column">
                            <textarea class="form-control reclamation" name="reclamation" required="" placeholder="Donnez tous le details possible pour bien régler votre réclamation .."
                                autofocus=""></textarea>
                            @if ($errors->has('reclamation'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('reclamation') }}</strong>
                            </span>
                            @endif
                        </div>
                                
                        <div class="col-sm-6 col-sm-offset-4 input-column" style="margin-top:20px;margin-bottom:10px;">
                                <input type="file"  value="{{old('fichier')}}"  name="fichier"  class="form-control">
                                @if ($errors->has('fichier'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fichier') }}</strong>
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