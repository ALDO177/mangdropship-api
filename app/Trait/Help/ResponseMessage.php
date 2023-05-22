<?php

namespace App\Trait\Help;


trait ResponseMessage{

    public function messageNotAuth(int $code = 401) : array{
        return [
            'code'    => $code,
            'message' => 'Unauthorizhation'
        ];
    }

    public function AccAuthentication(string $tokens){
        return [
            'code'      => 201,
            'message'   => 'ok',
            'tokens'    => $tokens,
        ];
    }
}