<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\ServiceSubscribtionInfo;
use Illuminate\Http\Request;

class AuthControlersResources extends Controller
{
    public function __construct(protected ServiceSubscribtionInfo $info)
    {
        $this->middleware(['auth:api-users', 'token_verified']);
    }

    public function index()
    {
        return $this->info->show();
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
