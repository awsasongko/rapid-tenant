<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function viewAny(User $authUser): bool
    {
        // If the user is a super user, they can view all users
        if ($authUser->hasRole('super_admin')) {
            return true;
        }

        // Non-super users need to have 'view_any_user' permission
        return $authUser->can('view_any_user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $targetUser
     * @return bool
     */
    public function view(User $authUser, User $targetUser): bool
    {
        // Super users can view any user
        if ($authUser->hasRole('super_admin')) {
            return true;
        }

        // Non-super users can only view other users who are not super users
        if (!$targetUser->hasRole('super_admin')) {
            return $authUser->can('view_user');
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function create(User $authUser): bool
    {
        return $authUser->can('create_user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $targetUser
     * @return bool
     */
    public function update(User $authUser, User $targetUser): bool
    {
        // Super users can update any user
        if ($authUser->hasRole('super_admin')) {
            return true;
        }

        // Non-super users cannot update super users
        if (!$targetUser->hasRole('super_admin')) {
            return $authUser->can('update_user');
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $targetUser
     * @return bool
     */
    public function delete(User $authUser, User $targetUser): bool
    {
        // Super users can delete any user
        if ($authUser->hasRole('super_admin')) {
            return true;
        }

        // Non-super users cannot delete super users
        if (!$targetUser->hasRole('super_admin')) {
            return $authUser->can('delete_user');
        }

        return false;
    }

    /**
     * Determine whether the user can bulk delete models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function deleteAny(User $authUser): bool
    {
        return $authUser->can('delete_any_user');
    }

    /**
     * Determine whether the user can permanently delete models.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $targetUser
     * @return bool
     */
    public function forceDelete(User $authUser, User $targetUser): bool
    {
        return $authUser->can('force_delete_user');
    }

    /**
     * Determine whether the user can bulk force delete models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function forceDeleteAny(User $authUser): bool
    {
        return $authUser->can('force_delete_any_user');
    }

    /**
     * Determine whether the user can restore models.
     *
     * @param  \App\Models\User  $authUser
     * @param  \App\Models\User  $targetUser
     * @return bool
     */
    public function restore(User $authUser, User $targetUser): bool
    {
        return $authUser->can('restore_user');
    }

    /**
     * Determine whether the user can bulk restore models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function restoreAny(User $authUser): bool
    {
        return $authUser->can('restore_any_user');
    }

    /**
     * Determine whether the user can replicate models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function replicate(User $authUser): bool
    {
        return $authUser->can('replicate_user');
    }

    /**
     * Determine whether the user can reorder models.
     *
     * @param  \App\Models\User  $authUser
     * @return bool
     */
    public function reorder(User $authUser): bool
    {
        return $authUser->can('reorder_user');
    }
}
