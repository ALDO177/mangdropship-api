<?php

namespace App\Service{

    use App\Http\Resources\ApiResponseJson;
    use App\Http\Resources\ResourceResponseMangAccount;
    use App\Models\paidNoticeMangAccount;
    use Illuminate\Http\Request;

    class MangAccountService{

        public function __construct(
            protected Request $request, 
            protected paidNoticeMangAccount $notice){}

        public function serviceListPaid(){
            return ApiResponseJson::make($this->notice::getListPaid($this->request));
        }
    }
}