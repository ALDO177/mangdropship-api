<?php

namespace App\Trait\Help;

use Illuminate\Support\Arr;

trait withoutWreapArray{
    
    public function wreap(array $data) : array{
        $array = [];
        foreach($data as $key => $value){
            $array[$key] = Arr::first($value);
        }
        return['error_validations' =>  $array];
    }

    public function LengthSlashPath(int $length, string $data) : string{
        $exp = explode('/', $data);
        return $exp[$length];
    }
}