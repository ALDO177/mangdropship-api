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

    public function messagesError(?string $messages, int $code = 400){
        return [
            'code'      => $code,
            'error'     => $code >= 400 ? true : false,
            'message'   => $messages,
        ];
    }

    public function AccAuthentication($tokens, string $messages ){
        return [
            'code'     => 201,
            'message'  => $messages,
            'tokens'   => $tokens,
        ];
    }

    public function messagesSuccess(?string $messages, int $code = 201){
        return [
            'code'      => $code,
            'error'     => $code >= 400 ? true : false,
            'message'   => $messages,
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