<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceCuponsMangseller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CuponsSellerController extends Controller
{

    public function __construct(
        protected ServiceCuponsMangseller $serviceMangAccess)
    {
        $this->middleware(
            [
                'auth:mang-sellers', 
                'localization', 
                'api-mang-seller-access', 
                'suplier'
            ]);
    }
    public function index() : JsonResponse
    {
        return $this->serviceMangAccess
               ->serviceListGetCupons();
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
