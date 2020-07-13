<?php

namespace App\Policies;

use App\User;
use App\Vol;
use Illuminate\Auth\Access\HandlesAuthorization;

class VolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    
    /* public function before($user , $ability)
        {
            if($user->is_admin)
                {
                    return true ;
                }
        }
      */  
      
   public function viewAny(User $user)
    {
        return $user->is_admin() ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vol  $vol
     * @return mixed
     */
    
    
     public function view(User $user, Vol $vol)
    {
        return $user->is_admin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin() ; 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vol  $vol
     * @return mixed
     */
    public function update(User $user, Vol $vol)
    {
        return $user->is_admin and $user->id=== $vol->user_id; 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vol  $vol
     * @return mixed
     */
    public function delete(User $user, Vol $vol)
    {
        return $user->is_admin and $user->id=== $vol->user_id; 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vol  $vol
     * @return mixed
     */
    public function restore(User $user, Vol $vol)
    {
        return $user->is_admin and $user->id=== $vol->user_id; 
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vol  $vol
     * @return mixed
     */
    public function forceDelete(User $user, Vol $vol)
    {
        return $user->is_admin and $user->id=== $vol->user_id; 
    }
}
