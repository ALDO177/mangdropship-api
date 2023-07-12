<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceSuplierProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class SuplierControllerProduk extends Controller
{

    public function __construct(protected ServiceSuplierProduk $serviceSuplierProduk)
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }
    public function index()
    {
        return $this->serviceSuplierProduk->serviceListProduk();
    }

    public function store(Request $request)
    {
        $url = Storage::disk('oss')->url('storage/kCb4ZVtIEk2MMi2yYS7eN2RbDxLpYBIiaTvyw2LR.png');
        echo $url;
        return ['messages' => 'success'];
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
