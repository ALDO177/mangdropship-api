<?php

use App\Http\Controllers\Web\VerificationsEmail;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('NoticeSubscribtions', ['route' => 'akdioanicnaic']);
});

Route::get('/reset-password', function(){
    return view('ResetPassword');
});

Route::controller(VerificationsEmail::class)->group(function(){
    Route::get('emails/verify', 'Verify')
        ->name('verify.email')
        ->middleware('handle_verify_email');
});
