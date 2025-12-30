<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UserAccessMenu;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAccessMenuPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UserAccessMenu');
    }

    public function view(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('View:UserAccessMenu');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UserAccessMenu');
    }

    public function update(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('Update:UserAccessMenu');
    }

    public function delete(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('Delete:UserAccessMenu');
    }

    public function restore(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('Restore:UserAccessMenu');
    }

    public function forceDelete(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('ForceDelete:UserAccessMenu');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UserAccessMenu');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UserAccessMenu');
    }

    public function replicate(AuthUser $authUser, UserAccessMenu $userAccessMenu): bool
    {
        return $authUser->can('Replicate:UserAccessMenu');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UserAccessMenu');
    }

}