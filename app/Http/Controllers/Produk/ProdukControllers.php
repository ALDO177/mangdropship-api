<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Service\Produk\ProdukService;
use Illuminate\Http\Request;

class ProdukControllers extends Controller
{
    public function __construct(protected ProdukService $produkService)
    {
        $this->middleware(['api-mang-user-access', 'localization']);
    }
    
    public function getProduk(){
        return $this->produkService->serviceListProduk('aslfas');
    }

    public function showProdukWithSlugh(string $slugh){
        return $this->produkService->serviceShowProduk($slugh);
    }
}
