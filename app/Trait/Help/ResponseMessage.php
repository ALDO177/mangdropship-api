<?php

namespace App\Trait\Help;


trait ResponseMessage{

    use withoutWreapArray;

    public function messageNotAuth(int $code = 401, string $messages = 'Unauthorizhation', array $arrays) : array{
        $globalsResponse = [
            'code'    => $code,
            'message' => $messages,
            'action'  => false,
        ];
        return array_merge_recursive($globalsResponse, $this->wreap($arrays));
    }

    public function AccAuthentication(string $tokens){
        return [
            'code'     => 201,
            'message'  => 'Ok',
            'tokens'   => $tokens,
        ];
    }

    public function messageAuth(int $code, string $messages, ?callable $callback){
        return [
            'code'      => $code,
            'message'   => $messages,
            'error'     => $code >= 400 ? true : false,
            'callback'  => $callback(),
        ];
    }
}