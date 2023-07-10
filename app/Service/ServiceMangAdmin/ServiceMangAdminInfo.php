<?php

namespace App\Service\ServiceMangAdmin{

    use Illuminate\Http\Request;

    class ServiceMangAdminInfo{

        public function __construct(protected Request $request){}

        public function serviceAdminInfo(){
            return auth('admins')->user();
        }
    }
}