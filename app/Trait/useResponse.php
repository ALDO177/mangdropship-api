<?php

namespace App\Trait{
    use Illuminate\Http\JsonResponse;

    trait useResponse{

        public function responseApiJson(mixed $data, ?int $statusKode = 201) : JsonResponse{
            return response()->json($data, $statusKode);
        }
    }
}