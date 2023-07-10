<?php

namespace App\Http\Controllers\MangAdmin;

use App\Http\Controllers\Controller;
use App\Service\ServiceMangAdmin\ServiceMangAdminInfo;
use Illuminate\Http\Request;

class MangAdminAccessController extends Controller
{

    public function __construct()
    {
        $this->middleware(['api-mang-admin-access', 'auth:admins', 'localization']);
    }

    public function info(ServiceMangAdminInfo $adminInfo){
        return $adminInfo->serviceAdminInfo();
    }
}
