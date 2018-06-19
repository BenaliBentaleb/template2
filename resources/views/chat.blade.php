 @extends('layouts.app') @section('chat')

<div>
    <div class="container-fluid" style="padding-top: 77px;">
      
        <div class="row chat-container">
            <div class="@forelse ($friends as $friend) col-sm-3 @empty col-sm-4 col-sm-offset-4 @endforelse users-chat" style="padding:0;@forelse ($friends as $friend)  @empty margin-top:150px; @endforelse">
                <ul class="nav nav-pills nav-stacked">
                        <li>
                                <a href="/chatRom" class="btn btn-block btn-primary chatroom" style="">Chat Room</a>
                            </li>
                    @forelse ($friends as $friend)
                    <li>
                        <a href="#user-{{$friend->id}}" role="tab" data-toggle="tab">
                            <span class="avatar avatar-xl" style="background-image:url(&quot;{{asset($friend->profile->photo_profile)}}&quot;);">
                                <onlineuser :friend="{{$friend->id}}"></onlineuser>
                            </span>
                            <span class="user-name"> {{$friend->nom.' '. $friend->prenom}}</span>
                        </a>
                    </li>
                    @empty
                    
                    <div class="panel-block" style="margin-top:20px;">
                            <div class="alert alert-warning" role="alert">Vous n'avez pas des amis</div>

                    </div>
                    @endforelse

                </ul>
            </div>


            <div class="col-sm-9 tab-content chat-content users-chat" style="padding:0;">
                @foreach($friends as $friend)
                <chat v-bind:userid="{{ Auth::user()->id }}" v-bind:friend="{{ $friend }}" v-bind:friendid="{{ $friend->id }}">
                </chat>
                @endforeach




            </div>
        </div>
    </div>
</div>




@endsection