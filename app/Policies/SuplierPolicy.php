<?php

namespace App\Policies;

use App\Models\MangSellerModels\MangSellers;
use App\Models\Supllier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuplierPolicy
{
    use HandlesAuthorization;

    public function viewAny(MangSellers $sellers)
    {
       //no
    }

    public function view(MangSellers $sellers, Supllier $suplier)
    {
        return $sellers->id === $suplier->id_sellers;
    }

    public function create(MangSellers $sellers)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(MangSellers $sellers, Supllier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(MangSellers $sellers, Supllier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(MangSellers $sellers, Supllier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(MangSellers $sellers, Supllier $suplier)
    {
        //
    }
}
