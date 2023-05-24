<?php

use App\Http\Controllers\Web\VerificationsEmail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Redis::command('set', ['aldo', 'aamskfkasnff']);
    return true;
});

Route::controller(VerificationsEmail::class)->group(function(){
    Route::get('emails/verify', 'Verify')
        ->name('verify.email')
        ->middleware('handle_verify_email');
});

