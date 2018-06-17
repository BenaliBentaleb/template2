@extends('layouts.app') @section('content')
         
<div class="row">
        <div class="col-md-8">
                    <div class="status" style="margin-top:0;padding:15px;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Modifier publication</h4>
                                </div>
                                     
                                <div class="col-md-6">
                                    <h4 class="card-title ml-auto" >Publier dans : @if(isset($publication->module->formation->nom)) {{ $publication->module->formation->nom }} @else NTICien - Général @endif</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="submit-modifier-publication"   action="{{route('publication.update',['id'=>$publication->id])}}" method="POST" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                <div class="row">

                                    <div class="col-md-8 form-group">
                                        <label>Titre</label>
                                        <input type="text" name="titre" class="form-control" value="{{$publication->titre}}">

                                    </div>
                                       
                                    
                                    
                                    <div class="col-md-4 form-group">
                                            <label>Module</label>
                                            <select  name ="module_id" class="form-control" style="margin-right:0;">
                                                    @if($publication->module_id)
                                                    @foreach($publication->getModules($publication->module_id) as $key => $module )
                                                    <optgroup label="{{$key}}">
                                                            @foreach( $module as $m )
                        
                                                            <option value="{{$m->id}}" @if($m->id ==$publication->module_id ) selected @endif  >{{$m->nom}}</option>
                                                            @endforeach
                                                      
                                                        </optgroup>
                                                        @endforeach

                                                        @else
                                                    <optgroup label="NTICien">
                                                        <option value="">Général</option>
                                                    </optgroup>
                                                    @endif
                                               
                                            </select>
                                        </div>

                                    

                                   
                                </div>
                                <div class="form-group">
                                   

                                        <!-- Past code here! -->
                                       <textarea name="contenu" id="event-content"> {!! $publication->contenu !!}</textarea>

                                   
                                </div>
                                @if( count($publication->publication_avec_fichier))
                                <div class="files-uploaded">
                                    <h4 class="files-uploaded-header">Les fichiers Télécharger</h4>
                                    <ul class="list-unstyled files-list">
                                    
                                        @foreach($publication->publication_avec_fichier as $fichier)
                                        <li class="single-file">
                                            <span>{{$fichier->nom_fichier}}</span>
                                            <a href="{{route('file.remove',['id'=>$fichier->id])}}" class="download-file-link" style="float:right;">
                                                <span style="font-size:16px;">&nbsp;Supprimer</span>
                                            </a>
                                        </li>
                                        <li class="clearfix divider"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </form>

                        </div>
                        <div class="card-footer" style="margin-top:20px;">
                            <div class="btn-list text-right">
                                <a href="{{route('publication.update',['id'=>$publication->id])}}" onclick=" event.preventDefault();
                                document.getElementById('submit-modifier-publication').submit();" class="btn btn-primary">Sauvgarder</a>
                                <a href="#" class="btn btn-secondary" onclick="window.history.back(); return false;">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
   
@endsection

