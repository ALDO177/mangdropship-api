<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Models\MangSellerModels\StoreStatus;
use App\Service\MangSellerServices\ServiceMangAccess;
use App\Trait\Help\ResponseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SuplierStatusController extends Controller
{
    use ResponseMessage;

    public function __construct(protected ServiceMangAccess $service)
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }
    public function index()
    {
        return $this->service->infoStatus();
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
        $credentials = Validator::make($request->all(), [
            'status'            => ['required', Rule::in(['open', 'close'])],
            'actived_at_start'  => ['required'],
            'actived_at_start'  => ['required'],
            'id'                => ['required', 'exists:store_statuses,id']
        ]);
        
        if($credentials->fails()){
             return SubscribtionResourcesResponse::make($this->messageNotAuth(400, 'Credentials',
             $credentials->messages()->toArray()))->response()->setStatusCode(400);
        }
        $storeStatus = StoreStatus::findOrUpdate(false, $id, $request->only(['status', 'actived_at_start', 'actived_at_start']));
        return $storeStatus;
    }

    public function destroy($id)
    {
        //
    }
}
