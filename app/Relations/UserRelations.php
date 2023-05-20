<?php

namespace App\Relations;

use App\Models\SubscribtionRoleUsers;
use App\Trait\UUID\UuidUsers;
use Illuminate\Foundation\Auth\User;

class UserRelations extends User{
    
    use UuidUsers;
    
    public function subscribe(){
        return $this->hasMany(SubscribtionRoleUsers::class, 'id');
    }
}