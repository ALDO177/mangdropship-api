<?php
namespace App\Service\Produk{

    use App\Models\Produk;

    class ProdukService{    
        
        public function __construct(protected Produk $produk){}
        
        public function serviceListProduk(string $action){
            return $this->produk->with(['subcategory'])->chunkMap(function($collection){
                return $collection;
            });
        }

        public function serviceShowProduk(string $slugh){
            return $this->produk->with([
                'suplier' => ['suplier' => ['store']],'variantProduk', 
                'subcategory' => ['subcategory'], 
                'galleries', 'videos', 'cupons'
            ])->where('slugh_produk', $slugh)->first();
        }
    }
}