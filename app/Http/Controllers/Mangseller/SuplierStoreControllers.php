<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangAccess;
use Illuminate\Http\Request;

class SuplierStoreControllers extends Controller
{

    public function __construct(protected ServiceMangAccess $service)
    {
        $this->middleware(['auth:mang-sellers', 'api-mang-seller-access', 'localization']);
    }
    public function index()
    {
        return $this->service->infoStore();
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
