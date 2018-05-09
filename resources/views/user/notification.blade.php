<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/reclamation.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/Navigation-Clean.css')}}">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notification</div>

                <div class="panel-body">
                    <ul class="groupe-control">


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                               <span class="glyphicon glyphicon-globe"></span>
                                    
                                                      
                                </a>
                   
                               <ul class="dropdown-menu" role="menu">
                   
                                    
                                @foreach($nots as  $notification)
                                   <li >
                                   <a href="{{$notification['profile'] }}" style="text-decoration: none" >
                                       <br>
                                       <small>{{ $notification['message'] }} </small>
                                   </a>
                               </li>
                               @endforeach
                              
                              </ul>
                       </li>
                            

                       
             
                       

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>-->
<script src="{{ asset('assets/js/custom-file-input.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>
