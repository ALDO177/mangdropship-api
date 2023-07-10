<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceCuponsMangseller;
use App\Trait\ResponseControl\useError;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class CuponsActiveProductControllers extends Controller
{

    use useError;

    public function __construct(protected ServiceCuponsMangseller $serviceCuponsMangseller)
    {
        $this->middleware
            ([
                'auth:mang-sellers', 
                'localization', 
                'api-mang-seller-access', 
                'suplier'
            ]);
        $this->middleware(function(Request $request, Closure $next){
             $productSuppliers = $this->serviceCuponsMangseller
                ->suplier
                ->with(['suplierProduk'])
                ->where('id_sellers', $request->user()->id)
                ->first();
                
            if($productSuppliers?->suplierProduk->count() < 1){
                return response()->json(
                    $this->errGlobalResponseAdditional(
                        402, 
                        __('error.MANG-ERROR-PRDS-CPN-1'), ['id' => $productSuppliers->id])
                , 402);
            }
            return $next($request);

        })->except(['index', 'show', 'update', 'destory']);
    }
    
    public function index()
    {
        //
    }

    public function store() : JsonResponse
    {
         return $this->serviceCuponsMangseller->serviceAddCuponsActive();
    }

    public function show(Request $request, $id)
    {
        if($id === 'actived'){
            return $this->serviceCuponsMangseller
                  ->serviceListProdukCuponsActived();
        }
        throw new RouteNotFoundException('Route Not Found');
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
