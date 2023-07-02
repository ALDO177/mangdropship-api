<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangAccess;
use Illuminate\Http\Request;

class CuponsSellerController extends Controller
{

    public function __construct(protected ServiceMangAccess $serviceMangAccess)
    {
        $this->middleware(
            [
                'auth:mang-sellers', 
                'localization', 
                'api-mang-seller-access', 
                'suplier'
            ]);
    }
    public function index()
    {
        return $this->serviceMangAccess->serviceListGetCupons();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
