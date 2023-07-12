<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Jobs\JobOberverProduk;
use App\Models\Produk;
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
        $produk = Produk::where('id', '04ff7e60-bf16-4fbe-8908-8331f517eed2')->first();
        Storage::disk('oss')->put('storage', $request->videos);

        return response()->json(['message' => 'success']);
        // Bus::chain([
        // //    new JobOberverProduk($produk, $request->collect()),
        //     function() use($request) : void{
        //     //    Storage::disk('oss')->put('storage', $request->file('videos'));
        //     }
        // ])->dispatch();

        //  return ['config' => 'success-queus'];
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
