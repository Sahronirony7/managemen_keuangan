<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\UserCompany;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCompanyPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:UserCompany');
    }

    public function view(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('View:UserCompany');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:UserCompany');
    }

    public function update(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('Update:UserCompany');
    }

    public function delete(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('Delete:UserCompany');
    }

    public function restore(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('Restore:UserCompany');
    }

    public function forceDelete(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('ForceDelete:UserCompany');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:UserCompany');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:UserCompany');
    }

    public function replicate(AuthUser $authUser, UserCompany $userCompany): bool
    {
        return $authUser->can('Replicate:UserCompany');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:UserCompany');
    }

}