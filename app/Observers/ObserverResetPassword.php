<?php

namespace App\Observers;
use App\Jobs\JobEmailMangAdmin;
use App\Models as ModelDB;

const message_activation_created = "User Aktivasi Melakukan Reset Password";

class ObserverResetPassword
{
    public function created(ModelDB\PasswordAuthentications $passwordAuthentications)
    {
        $passwordAuthentications->makeHidden(['uuid']);
        dispatch(new JobEmailMangAdmin($passwordAuthentications))->afterCommit();
        
        ModelDB\Seller\SelersHistoryAuth::create([
            'type'          => $passwordAuthentications->type,
            'data'          => $passwordAuthentications->toArray(),
            'user_id'       => $passwordAuthentications->id_verify,
            'info_messages' => message_activation_created,
        ]);
    }
    
    public function updated(ModelDB\PasswordAuthentications $passwordAuthentications)
    {
        $passwordAuthentications->makeHidden(['uuid']);
        dispatch(new JobEmailMangAdmin($passwordAuthentications))->afterCommit();
    }

    public function deleted(ModelDB\PasswordAuthentications $passwordAuthentications)
    {
        //
    }

    public function restored(ModelDB\PasswordAuthentications$passwordAuthentications)
    {
        //
    }

    public function forceDeleted(ModelDB\PasswordAuthentications $passwordAuthentications)
    {
        //
    }
}
