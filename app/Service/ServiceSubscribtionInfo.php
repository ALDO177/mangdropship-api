<?php

namespace App\Service{

    use App\Http\Resources\ResourceResponseMangInfoAccount;
    use Illuminate\Http\Request;

    class ServiceSubscribtionInfo{

        public function __construct(protected Request $request){}

        public function show(){
            $usersInfo = 
            auth()
                ->user()
                ->{'with'}(['subscribtions' => ['roleSubscribtions']])
                ->where('id', auth()->user()->id)
                ->first();

            return ResourceResponseMangInfoAccount::make($usersInfo);
        }
    }
}