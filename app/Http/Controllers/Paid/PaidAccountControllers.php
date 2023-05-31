<?php

namespace App\Http\Controllers\Paid;

use App\Http\Controllers\Controller;
use App\Service\MangAccountService;
use Illuminate\Http\Request;

class PaidAccountControllers extends Controller
{
    public function __construct(protected MangAccountService $accountService){
        $this->middleware(['api-mang-access']);
     }
    
    public function List(){
        return $this->accountService->serviceListPaid();
    }
}
