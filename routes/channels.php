<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('Chat.{user_id}.{friend_id}', function ($user, $user_id, $friend_id) {
    return $user->id == $friend_id;
});

Broadcast::channel('Online', function ($user) {
    return $user;
});

Broadcast::channel('comment', function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->name,
    ];
});

Broadcast::channel('like', function ($user) {
    return $user;
});

Broadcast::channel('chatroom', function ($user) {
    return Auth::check();
  });
