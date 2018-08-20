<?php

namespace App\Listeners;

use App\Notifications\EmailVerificationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// implements ShouldQueue 让这个监听器异步执行
class RegisteredListener implements ShouldQueue
{
    //When event activated the handle function of the listener will be called
    public function handle(Registered $event)
    {
        //capture the user just registered

        $user = $event->user;
        // using notify to sent message
        $user->notify(new EmailVerificationNotification());
    }
}