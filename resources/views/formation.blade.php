@extends('layouts.app') @section('content')
<div style="">
    <div class="container" style="">
        <div class="row">
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

                                        <select class="module-options" name="status_module" style="margin-right:0;">
                                               
                                             @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
                                          
                                           

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

                                        <select class="module-options" name="blog_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
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

                                        <select class="module-options" name="faq_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
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

                                        <select class="module-options" name="sondage_module" style="margin-right:0;">

                                                
                                                @foreach( $modules as $key =>$module)
                                            <optgroup label="{{$key}}">
                                            @foreach( $module as $m )
                        
                                             <option value="{{$m->id}}">{{$m->nom}}</option>
                                             @endforeach
                                            </optgroup>
                                           
                                            @endforeach
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
        </div>
    </div>
</div>
@endsection