<?php

namespace App\Policies;

use App\Models\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Models\admin  $user
     * @return mixed
     */
    public function viewAny(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(admin $user, post $post)
    {
        //
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
       return $this->getPermission($user,1);
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,2);
    }


    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,3);
    }

    public function tag(admin $user)
    {
        return $this->getPermission($user,8);
    }

    public function category(admin $user)
    {
        return $this->getPermission($user,9);
    }

    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\admin  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }
}
