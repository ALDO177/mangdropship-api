<?php

use App\Events\EventResetPassword;
use App\Http\Controllers\Web\VerificationsEmail;
use App\Jobs\JobEmailMangAdmin;
use App\Mail\MailForgotPassword;
use App\Models\Admin\AdminMangdropship;
use App\Models\PasswordAuthentications;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('NoticeSubscribtions', ['route' => 'akdioanicnaic']);
});

Route::get('/reset-password', function(){
    return view('ResetPassword');
});

Route::get('send-email', function(){
    $users = PasswordAuthentications::where('email', 'mangdropship123@gmail.com')->first();
    EventResetPassword::dispatch($users);
    
    return $users;

});

Route::controller(VerificationsEmail::class)->group(function(){
    Route::get('emails/verify', 'Verify')
        ->name('verify.email')
        ->middleware('handle_verify_email');
});