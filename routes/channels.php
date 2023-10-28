<?php

use Illuminate\Support\Facades\Broadcast;

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

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});


Broadcast::channel('chat-dm-{id}-{id}', function ($user) {

//    dd($user);
    return Auth::check();
});
Broadcast::channel('chat-channel-{id}', function ($user) {
    return Auth::check();
});

Broadcast::channel('chat-reply-{id}', function ($user) {
    return Auth::check();
});
