<?php

namespace App\Http\Controllers\Paid;

use App\Http\Controllers\Controller;
use App\Service\MangAccountService;

class PaidAccountControllers extends Controller
{
    public function __construct(protected MangAccountService $accountService){
        $this->middleware(['api-mang-access', 'localization']);
     }
    
    public function List(){
        return $this->accountService->serviceListPaid();
    }
}
