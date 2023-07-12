<?php
namespace App\Service\MangSellerServices{

    use App\Models\Produk;
    use App\Models\Supllier;
    use Illuminate\Http\Request;

    class ServiceSuplierProduk{

        public function __construct(
            protected Request $request,
            protected Produk $produk,
            protected Supllier $supllier){}

        public function serviceListProduk() {
            return $this->supllier->with(['suplierProduk' => ['product']])->where('id_sellers', $this->request->user()->id)->first();
        }
    }
}