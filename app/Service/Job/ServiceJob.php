<?php

namespace App\Service\Job{

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class ServiceJob{

        public function __construct(protected Request $request){}
        
        public function push(){
            Storage::disk('oss')->put('storage', $this->request->file('images'));
        }
    }
}