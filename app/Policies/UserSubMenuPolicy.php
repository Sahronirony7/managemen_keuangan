<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UserSubMenu;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSubMenuPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UserSubMenu');
    }

    public function view(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('View:UserSubMenu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UserSubMenu');
    }

    public function update(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('Update:UserSubMenu');
    }

    public function delete(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('Delete:UserSubMenu');
    }

    public function restore(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('Restore:UserSubMenu');
    }

    public function forceDelete(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('ForceDelete:UserSubMenu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UserSubMenu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UserSubMenu');
    }

    public function replicate(AuthUser $authUser, UserSubMenu $userSubMenu): bool
    {
        return $authUser->can('Replicate:UserSubMenu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UserSubMenu');
    }

}