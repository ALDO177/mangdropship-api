<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\AuthServiceController;
use Illuminate\Http\Request;

class AuthControlersResources extends Controller
{
    public function __construct(protected AuthServiceController $service)
    {
        $this->middleware('auth:api-users');
    }

    public function index()
    {
        return $this->service->serviceIndex();
    }

    public function store(Request $request)
    {
        
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
