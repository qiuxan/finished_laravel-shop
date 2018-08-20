<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;
use Cache;

class EmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    //
    public function via($notifiable)
    {
        return ['mail'];
    }

    //This function will be called to build message content by using App\Models\User objects
    //
    public function toMail($notifiable)
    {

        //Using Str class to build a random string var is the length of the string

        $token = Str::random(16);
        // set this random string in cache for 30 mins
        Cache::set('email_verification_'.$notifiable->email, $token, 30);
        $url = route('email_verification.verify', ['email' => $notifiable->email, 'token' => $token]);

        return (new MailMessage)
            ->greeting($notifiable->name.'Hello: ')
            ->subject('Register successfully, please verify your email')
            ->line('Please click the following link to verify')
            ->action('Verify',  $url);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}