<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UserMenu;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserMenuPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UserMenu');
    }

    public function view(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('View:UserMenu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UserMenu');
    }

    public function update(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('Update:UserMenu');
    }

    public function delete(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('Delete:UserMenu');
    }

    public function restore(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('Restore:UserMenu');
    }

    public function forceDelete(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('ForceDelete:UserMenu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UserMenu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UserMenu');
    }

    public function replicate(AuthUser $authUser, UserMenu $userMenu): bool
    {
        return $authUser->can('Replicate:UserMenu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UserMenu');
    }

}