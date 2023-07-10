<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\VerifyTokens\VerifyTokensEmail;
use Illuminate\Http\Request;

class VerificationsEmail extends Controller
{
    public function Verify(Request $request){
        if(VerifyTokensEmail::updateTokensVerify($request)){
            echo 'Account Success Verified....';
        }
    }
}
