 @extends('layouts.app') @section('chat')

<div>
    <div class="container-fluid" style="padding-top: 77px;">
      
        <div class="row chat-container">
            <div class="col-sm-3 users-chat" style="padding:0;">
                <ul class="nav nav-pills nav-stacked">
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
                    <div class="panel-block">
                        You don't have any friends
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