<?php

namespace App\Service{

    use App\Http\Resources\ResourceApiArray;
    use App\Trait\useResponse;
    use Illuminate\Http\Request;

    class ServiceSubscribtionInfo{

        use useResponse;
        public function __construct(protected Request $request)
        {
            
        }

        public function show(){
            $usersInfo = auth()
                ->user()
                ->with(['subscribtions' => ['roleSubscribtions']])
                ->where('id', auth()->user()->id)->first();
            return ResourceApiArray::make($usersInfo);
        }
    }
}