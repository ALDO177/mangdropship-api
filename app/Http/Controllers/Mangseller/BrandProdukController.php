<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Images\WebpImages;
use App\Models\Admin\ListMerkProdukSeller;
use App\Models\BadgesUmkm;
use App\Models\MangSellerModels\ListBrandProduk;
use App\Service\MangSellerServices\ServiceBrandProduk;
use Illuminate\Http\Request;
use App\Trait\ResponseControl\useError;
use App\Trait\ResponseControl\useSuccess;
use App\Trait\Validator\useValidatorMangSeller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BrandProdukController extends Controller
{
    use useError, useSuccess, useValidatorMangSeller;
    public function __construct(
        protected Request $request,
        protected ServiceBrandProduk $serviceBrandProduk,
        protected ListMerkProdukSeller $brandMangdropship,
        protected BadgesUmkm $badgesUmkm
    ) {
        $this->middleware([
            'auth:mang-sellers',
            'localization',
            'api-mang-seller-access',
            'suplier'
        ]);
    }

    public function index($path): JsonResponse
    {
        switch ($path) {
            case 'local':
                $listBrand = $this->serviceBrandProduk->supllier::getListBrandProduk($this->request->user()->id);
                if ($listBrand->count() >= 1) return response()->json($listBrand->sortDesc()->values(), 201);
                return response()->json($this->errGlobalResponse(200, __('error.MANG-ERROR-NULL-TRB-1')));
                break;
            case 'mang':
                return response()->json($this->brandMangdropship->all()->sortByDesc('id')->values());
                break;
            case 'active':
                return response()->json($this->badgesUmkm->all());
                break;
            default:
                return response()->json($this->errGlobalResponse(400, __('error.MANG-ERROR-RNFN-HND-V1')));
        }
    }

    public function store(Request $request, $path)
    {
        $suplier   = $this->serviceBrandProduk->supllier->findIdSellers($request->user()->id);
        switch ($path) {
            case 'store-local':
                $credentials = $this->validationBrandStoreProduk($request->all());
                if ($credentials->fails()) {
                    return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                        401,
                        __('error.MANG-ERROR-VLD-1'),
                        $credentials->messages()->toArray()
                    ));
                }
                $webImages = new WebpImages($request->file('path'), 100, 100);
                $webImages->putWithDisk('oss', env('STG_MANG_SELLER') . '/brand');

                ListBrandProduk::create([
                    'id_suplier' => $suplier->id,
                    'merk_name'  => $request->merk_name,
                    'status'     => $request->status,
                    'position'   => $request->position,
                    'path'       => $webImages->filename,
                ]);
                return response()->json(
                    $this->successGlobalResponse(
                        201,
                        __('success.MANG-SUCCESS-CRT-MG', ['name' => 'brand'])
                    ),
                    201
                );
            case 'store-active':
                $credentials = Validator::make($request->all(), [
                    'badges_id'     => ['required', 'unique:badges_umkms,badges_id'],
                    'badges_type'   => ['required']
                ]);
                if ($credentials->fails()) {
                    return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                        401,
                        __('error.MANG-ERROR-VLD-1'),
                        $credentials->messages()->toArray()
                    ));
                }
                $created =  $this->badgesUmkm->create([
                    'id_suplier'  => $suplier->id,
                    'badges_id'   => $request->badges_id,
                    'badges_type' => $request->badges_type
                ]);
                return response()->json($created);
            default:
                return response()->json($this->errGlobalResponse(400, __('error.MANG-ERROR-RNFN-HND-V1')));
        }
    }

    public function show($id, $path)
    {
        //
    }

    public function update(Request $request, $id, $path)
    {
        $credentials = $this->validationBrandStoreProduk($request->all(), true);
        if ($credentials->fails()) {
            return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                401,
                __('error.MANG-ERROR-VLD-1'),
                $credentials->messages()->toArray()
            ));
        }
        $suplier = $this->serviceBrandProduk->supllier->findIdSellers($request->user()->id);
        $request['id_suplier'] = $suplier->id;
        ListBrandProduk::where('id', $id)->update($request->only(['id_suplier', 'merk_name', 'path', 'position', 'status']));
    }

    public function destroy($id, $path)
    {
        $credentials = Validator::make(['id' => $id], [
            'id' => ['required', 'exists:list_brand_produks,id', 'numeric']
        ]);
        if ($credentials->fails()) {
            return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                401,
                __('error.MANG-ERROR-VLD-1'),
                $credentials->messages()->toArray()
            ));
        }

        if ($this->serviceBrandProduk->destroyBrand($id)) {
            return response()->json($this->successGlobalResponse(
                201,
                __(
                    'success.MANG-SUCCESS-DEL',
                    ['name' => 'Brand']
                )
            ));
        }
        return response()->json($this->errGlobalResponse(
            400,
            __('error.MANG-ERROR-ATZ-HND-V1')
        ));
    }

    public function ListBrandProdukMangdropship()
    {
    }
}
