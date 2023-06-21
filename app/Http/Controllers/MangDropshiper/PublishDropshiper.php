<?php

namespace App\Http\Controllers\MangDropshiper;

use App\Http\Controllers\Controller;
use App\Service\MangdropshiperService\PublishDropshiperService;
use Illuminate\Http\Request;

class PublishDropshiper extends Controller
{
    
    public function __construct(
        protected PublishDropshiperService $publishCategory){}

    public function showSlughCategory(){
        return $this->publishCategory->serviceShowSlughCategory();
    }

    public function showSlughPublishCategory(string $publish){
        return $this->publishCategory->serviceShowSlughPublishCategory($publish);
    }
}
