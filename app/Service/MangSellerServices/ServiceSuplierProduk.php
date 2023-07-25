<?php
namespace App\Service\MangSellerServices{

    use App\Models\Produk;
    use App\Models\Supllier;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;

    class ServiceSuplierProduk{

        public function __construct(
            protected Request $request,
            protected Produk $produk,
            protected Supllier $supllier){}

        public function serviceListProduk() {
            return $this->supllier->with(['suplierProduk' => ['product' => ['variantProduk']]])->where('id_sellers', $this->request->user()->id)->first();
        }

        protected function suppliers(){
            $suplier = $this->supllier->where('id_sellers', $this->request->user()->id)->first();
            return $suplier;
        }

        public function showIdProduk(string $idProduk) {
            $optionsRls = $this->request->with === 'rls' ? ['variantProduk', 'subcategory' => ['subcategory'], 'galleries', 'videos', 'cupons', 'badgesUmkn'] : ['galleries'];
            return $this->produk->query()->with($optionsRls)
                ->where(function(Builder $query) use($idProduk){
                 $query->where('id', $idProduk);
                 $query->orWhere('slugh_produk', $idProduk)
                ->whereHas('suplierProduk', function(Builder $builder){
                    return $builder->where('id_suplier', $this->suppliers()->id);
            });
            })->first();
        }

        public function storeProdukSuplliers(){
            return $this->request->all();
        }
    }
}