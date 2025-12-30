<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserRolePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UserRole');
    }

    public function view(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('View:UserRole');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UserRole');
    }

    public function update(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('Update:UserRole');
    }

    public function delete(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('Delete:UserRole');
    }

    public function restore(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('Restore:UserRole');
    }

    public function forceDelete(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('ForceDelete:UserRole');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UserRole');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UserRole');
    }

    public function replicate(AuthUser $authUser, UserRole $userRole): bool
    {
        return $authUser->can('Replicate:UserRole');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UserRole');
    }

}