@extends('layouts.app') @section('content')

<div style="margin-top:20px;">
    <div class="container" style="margin-top:97px;">
        <div class="row">

            <div class="col-md-3">
                <ul class="list-group side-bar">
                    <li class="list-group-item" style="padding-top:10px;">
                        <a href="#" class="list-anchor">
                            <span class="nticien-circle">
                                <i class="fa fa-star"></i>
                            </span>
                            <span>Acceuil - NTICien</span>
                        </a>
                    </li>
                    @foreach($departement as $dep)
                    <li class="list-group-item departement">
                        <i class="icon-grid"></i>
                        <span class="departement" style="font-weight:bold;">Dépratement :{{$dep->nom}}</span>
                    </li>


                    @foreach($dep->formation as $formation) @if(str_contains($formation->nom,'Tronc Commun'))

                    <li class="list-group-item">
                        <a href="#" class="list-anchor ">
                            <span class="l1-circle">{{ substr($formation->nom,0,2) }}</span>
                            <span>{{$formation->nom}}</span>
                        </a>
                    </li>
                    @endif @if(str_contains($formation->nom,'Licence'))
                    <li class="list-group-item">
                        <a href="#" class="list-anchor list-anchor-l3">
                            <span class="licence-circle">L3</span>
                            <span>{{$formation->nom}}</span>
                        </a>
                    </li>
                    @endif @if(str_contains($formation->nom,'Master 1'))
                    <li class="list-group-item">
                        <a href="#" class="list-anchor list-anchor-master1">
                            <span class="master1-circle">M1</span>
                            <span>{{$formation->nom}}</span>
                        </a>
                    </li>
                    @endif @if(str_contains($formation->nom,'Master 2'))
                    <li class="list-group-item">
                        <a href="#" class="list-anchor list-anchor-master2">
                            <span class="master2-circle">M2</span>
                            <span>{{$formation->nom}}</span>
                        </a>
                    </li>
                    @endif @endforeach @endforeach


                    <li class="list-group-item border-top">
                        <a href="#" class="list-anchor">
                            <i class="icon-bell icon-sidebar"></i>
                            <span style="font-size:15px;">Les évenements</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="list-anchor">
                            <i class="icon-graduation icon-sidebar"></i>
                            <span style="font-size:15px;">Portail mémoires</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="list-anchor">
                            <i class="icon-exclamation icon-sidebar"></i>
                            <span style="font-size:15px;">Déposer réclamation</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <div class="share-zone">


                    <div>
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#tab-1" role="tab" data-toggle="tab">
                                    <i class="icon-speech icon"></i>Status</a>
                            </li>
                            <li>
                                <a href="#tab-2" role="tab" data-toggle="tab">
                                    <i class="icon-doc icon"></i>Tutorial</a>
                            </li>
                            <li>
                                <a href="#tab-3" role="tab" data-toggle="tab">
                                    <i class="icon-question icon-sidebar"></i>FAQ</a>
                            </li>
                            <li class="active">
                                <a href="#tab-4" role="tab" data-toggle="tab">
                                    <i class="icon-list icon"></i>Sondage</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" role="tabpanel" id="tab-1">

                                <form action="{{route('status.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;">

                                        <select class="module-options" style="margin-right:0;">
                                            <optgroup label="{{$a}}">
                                                <option value="12" selected="">Algorithme</option>
                                                <option value="13">CRI</option>
                                                <option value="14">Composant</option>
                                                <option value="">Analyse 1</option>
                                                <option value="">Algebre 1</option>
                                            </optgroup>
                                        </select>


                                    </div>



                                    <textarea class="form-control content" name="status" id="summernote-status"></textarea>
                                    <input type="file" name="file" multiple="" id="file_status" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                                    <div class="box" style="margin-left:10px;display:  inline-block;">
                                        <input type="file" name="files[]" id="file-status" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                            multiple="">
                                        <label for="file-status" style="border: 1px solid #448ccb; ">
                                            <span></span>
                                            <strong style="font-weight:400;">Choose a file…</strong>
                                        </label>
                                    </div>
                                    <button class="btn btn-default" type="submit" id="publier-status">Publier</button>
                                </form>

                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">

                                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;">

                                        <select class="module-options" style="margin-right:0;">
                                            <optgroup label="{{$a}}">
                                                <option value="12" selected="">Algorithme</option>
                                                <option value="13">CRI</option>
                                                <option value="14">Composant</option>
                                                <option value="">Analyse 1</option>
                                                <option value="">Algebre 1</option>
                                            </optgroup>
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="blog" id="summernote-blog"></textarea>

                                    <input type="file" name="file" multiple="" id="file_blog" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                                    <div class="box" style="margin-left:10px;display:  inline-block;">
                                        <input type="file" name="files[]" id="file-blog" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                            multiple="">
                                        <label for="file-blog" style="border: 1px solid #448ccb; ">
                                            <span></span>
                                            <strong style="font-weight:400;">Choose a file…</strong>
                                        </label>
                                    </div>
                                    <button class="btn btn-default" type="submit" id="publier-status">Publier</button>
                                    <input type="hidden" name="type" value="blog">

                                </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">

                                <form action="{{route('faq.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;">

                                        <select class="module-options" style="margin-right:0;">
                                            <optgroup label="{{$a}}">
                                                <option value="12" selected="">Algorithme</option>
                                                <option value="13">CRI</option>
                                                <option value="14">Composant</option>
                                                <option value="">Analyse 1</option>
                                                <option value="">Algebre 1</option>
                                            </optgroup>
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="faq" id="summernote-faq"></textarea>
                                    <input type="file" name="file" multiple="" id="file_faq" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                                    <div class="box" style="margin-left:10px;display:  inline-block;">
                                        <input type="file" name="files[]" id="file-faq" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                            multiple="">
                                        <label for="file-faq" style="border: 1px solid #448ccb; ">
                                            <span></span>
                                            <strong style="font-weight:400;">Choose a file…</strong>
                                        </label>
                                    </div>
                                    <button class="btn btn-default" type="submit" id="publier-status">Publier</button>

                                </form>
                            </div>
                            <div class="tab-pane active" role="tabpanel" id="tab-4">

                                <form action="{{route('sondage.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div id="border-bottom">
                                        <span class="status-title">Titre :&nbsp;</span>

                                        <input type="text" id="titre" class="title" name="titre" style="font-size:16px;">

                                        <select class="module-options" style="margin-right:0;">
                                            <optgroup label="{{$a}}">
                                                <option value="12" selected="">Algorithme</option>
                                                <option value="13">CRI</option>
                                                <option value="14">Composant</option>
                                                <option value="">Analyse 1</option>
                                                <option value="">Algebre 1</option>
                                            </optgroup>
                                        </select>


                                    </div>

                                    <textarea class="form-control content" name="sondage" id="summernote-sondage"></textarea>

                                    <input type="file" name="file" multiple="" id="file_sondage" class="inputfile inputfile-6" data-multiple-caption="{count} files selected">
                                    <div class="box" style="margin-left:10px;display:  inline-block;">
                                        <input type="file" name="files[]" id="file-sondage" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"
                                            multiple="">
                                        <label for="file-sondage" style="border: 1px solid #448ccb; ">
                                            <span></span>
                                            <strong style="font-weight:400;">Choose a file…</strong>
                                        </label>
                                    </div>
                                    <button class="btn btn-default" type="submit" id="publier-status">Publier</button>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="status">
                    <ul class="list-inline">
                        <li>
                            <img class="publisher-image" style="background-image:url(&quot;assets/img/customer.png&quot;);">
                        </li>
                        <li>
                            <ul class="list-unstyled publisher-info">
                                <li class="publisher-name">Bentaleb Youssouf</li>
                                <li class="role-admin">Administateur</li>
                                <li class="status-time">20 min ago</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-options status-options"></i>
                        </a>
                        <ul class="list-unstyled dropdown-menu dropdown-menu-right" style="margin-top:20px;">
                            <li>
                                <a href="#">
                                    <i class="icon-pencil"></i>
                                    <span>&nbsp; Modifier</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-trash"></i>
                                    <span>&nbsp; Supprimer</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-eyeglass"></i>
                                    <span>&nbsp; Suivre</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="icon-flag"></i>
                                    <span>&nbsp; Signaler</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="status-title">Heading</h3>
                    <hr>
                    <div style="text-align:center;">
                        <span>Status de module :&nbsp;</span>
                        <span class="module">
                            <a href="index.html">L1-Algorithme</a>
                            <br>
                        </span>
                    </div>
                    <div>
                        <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies elit vel placerat pellentesque.
                            Vestibulum aliquam nulla ac vehicula eleifend. Pellentesque habitant morbi tristique senectus
                            et netus et malesuada fames ac turpis egestas. Quisque dapibus ac tellus luctus cursus. Maecenas
                            mattis sollicitudin arcu, vitae rhoncus magna varius sit amet. Duis ultricies sagittis magna,
                            id ullamcorper turpis rhoncus sed. Curabitur sapien tellus, gravida id tellus eget, blandit egestas
                            magna. Vestibulum ipsum augue, mattis in pellentesque non, dapibus quis velit. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus. Pellentesque suscipit fermentum convallis. Morbi aliquam
                            vitae diam quis iaculis. Integer eget augue rutrum, vestibulum arcu vitae, porttitor augue. Phasellus
                            non sodales quam, eu vestibulum tortor.
                            <br>
                        </p>
                        <img class="img-responsive content-image" src="assets/img/image-left-sub.png">
                    </div>
                    <hr style="width:100%;">
                    <div style="text-align:center;margin-top:10px;margin-bottom:10px;">
                        <div class="like">
                            <i class="icon-like"></i>
                            <span>J'aime</span>
                            <span class="likes-number">20</span>
                        </div>
                        <div class="comment">
                            <i class="icon-bubble"></i>
                            <span>Commenter</span>
                            <span class="comments-number">20</span>
                        </div>
                    </div>
                    <hr style="width:100%;">
                </div>
            </div>
            <div class="col-md-3">
                <div class="evenement admin-bar">
                    <a href="#event-collapse1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe1" style="text-decoration:none;">
                        <h3 class="text-info even-title">Event title</h3>
                    </a>
                    <div id="event-collapse1" class="collapse">
                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                            <br>
                        </p>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:16px;"></i>
                            <span>&nbsp;Date debut :&nbsp;</span>
                            <span>2018-04-06</span>
                        </div>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:17px;"></i>
                            <span>&nbsp;Date fin :&nbsp;</span>
                            <span>2018-05-05</span>
                        </div>
                        <span class="publisher">Publier par :</span>
                        <div>
                            <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                            <ul class="list-unstyled publisher-info">
                                <li>
                                    <strong>Bentaleb Youssouf</strong>
                                </li>
                                <li>
                                    <span class="role-admin">Administration</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="evenement prof-bar">
                    <a href="#event-collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe2" style="text-decoration:none;">
                        <h3 class="text-info even-title">Event title</h3>
                    </a>
                    <div id="event-collapse2" class="collapse">
                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                            <br>
                        </p>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:16px;"></i>
                            <span>&nbsp;Date debut :&nbsp;</span>
                            <span>2018-04-06</span>
                        </div>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:17px;"></i>
                            <span>&nbsp;Date fin :&nbsp;</span>
                            <span>2018-05-05</span>
                        </div>
                        <span class="publisher">Publier par :</span>
                        <div>
                            <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                            <ul class="list-unstyled publisher-info">
                                <li>
                                    <strong>Bentaleb Youssouf</strong>
                                </li>
                                <li>
                                    <span class="role-prof">Enseignant</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="evenement club-bar">
                    <a href="#event-collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="event-collaspe3" style="text-decoration:none;">
                        <h3 class="text-info even-title">Event title</h3>
                    </a>
                    <div id="event-collapse3" class="collapse">
                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                            <br>
                        </p>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:16px;"></i>
                            <span>&nbsp;Date debut :&nbsp;</span>
                            <span>2018-04-06</span>
                        </div>
                        <div style="font-size:15px;">
                            <i class="icon-calendar" style="font-size:17px;"></i>
                            <span>&nbsp;Date fin :&nbsp;</span>
                            <span>2018-05-05</span>
                        </div>
                        <span class="publisher">Publier par :</span>
                        <div>
                            <img class="publisher-image" style="width:40px;height:40px;background-image:url(&quot;assets/img/customer.png&quot;);">
                            <ul class="list-unstyled publisher-info">
                                <li>
                                    <strong>Bentaleb Youssouf</strong>
                                </li>
                                <li>
                                    <span class="role-club">Club GDG</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection