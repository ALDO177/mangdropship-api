<?php

namespace App\Service\MangSellerServices{

    use Illuminate\Http\Request;

    class ServiceMangAccess{

        public function __construct(protected Request $request)
        {
            
        }

        
        public function accessInfo(){
            return auth()->user();
        }
    }
}