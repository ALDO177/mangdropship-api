<?php

namespace App\Http\Resources\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    public function mangdropship(int $code = 200){
        return response()->json(self::$macros, $code);
    }
}
