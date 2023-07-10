<?php

use App\Http\Controllers\Web\VerificationsEmail;
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

Route::get('test-oss', function(){
    $url = Storage::disk('oss')->url('storage/kCb4ZVtIEk2MMi2yYS7eN2RbDxLpYBIiaTvyw2LR.png');
    echo $url;
});