<?php

namespace App\Exceptions;

use Exception;

class HandeErrorAutentication extends Exception
{
    
    public function context() : array{
        return ['error' => 'Ada Kesalahan Authentication'];
    }
}
