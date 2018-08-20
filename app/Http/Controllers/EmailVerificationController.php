<?php

namespace App\Http\Controllers;


use App\Exceptions\InvalidRequestException;

use Exception;
use App\Models\User;
use Cache;
use Illuminate\Http\Request;
use App\Notifications\EmailVerificationNotification;
use Mail;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        if (!$email || !$token) {
            throw new InvalidRequestException('Verified link is not correct');
        }
        if ($token != Cache::get('email_verification_'.$email)) {
            throw new InvalidRequestException('Verified link is not correct or it is expired');
        }
        if (!$user = User::where('email', $email)->first()) {
            throw new InvalidRequestException('User not exists');
        }

        // get email and token from url
        $email = $request->input('email');
        $token = $request->input('token');
        // if  one of them is null, give  error message
        if (!$email || !$token) {
            throw new Exception('Invalid link');
        }
        // get data from the cache  and compare with the token of url
        //if no cache or tokens are not the same, thorough information
        if ($token != Cache::get('email_verification_'.$email)) {
            throw new Exception('Something wrong with the link or the link has expired');
        }

        //
        //find the email from db.
        //normally with right token, there will be a right existing email
        //however this is to avoid unpredictable bug

        if (!$user = User::where('email', $email)->first()) {
            throw new Exception('user not exist');
        }
        // delete the key from the cache
        Cache::forget('email_verification_'.$email);
        // change the email verified to true in db
        $user->update(['email_verified' => true]);

        // notify user.
        return view('pages.success', ['msg' => 'Email verified successfully']);
    }


    public function send(Request $request)
    {
        $user = $request->user();
        if ($user->email_verified) {
            throw new InvalidRequestException('You have already verified your email');
        }

        $user = $request->user();
        // check the verified status of the user
        if ($user->email_verified) {
            throw new Exception('You already verified your email');
        }
        // call notify() to send the notification class we have defined
        $user->notify(new EmailVerificationNotification());

        return view('pages.success', ['msg' => 'Verified email sent']);
    }
}