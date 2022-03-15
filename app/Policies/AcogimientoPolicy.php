<?php

namespace App\Policies;

use App\Models\Acogimiento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcogimientoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acogimiento  $acogimiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Acogimiento $acogimiento)
    {
        return $user->id === $acogimiento->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acogimiento  $acogimiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Acogimiento $acogimiento)
    {
        if($user->id === $acogimiento->id){
            $acogimiento->aceptado === true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acogimiento  $acogimiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Acogimiento $acogimiento)
    {
        if($acogimiento->aceptado === false){
            return $user->email === "admin@acnur.org";
        }
        
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acogimiento  $acogimiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Acogimiento $acogimiento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acogimiento  $acogimiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Acogimiento $acogimiento)
    {
        //
    }
}
