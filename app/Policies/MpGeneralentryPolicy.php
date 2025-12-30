<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpGeneralentry;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpGeneralentryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpGeneralentry');
    }

    public function view(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('View:MpGeneralentry');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpGeneralentry');
    }

    public function update(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('Update:MpGeneralentry');
    }

    public function delete(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('Delete:MpGeneralentry');
    }

    public function restore(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('Restore:MpGeneralentry');
    }

    public function forceDelete(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('ForceDelete:MpGeneralentry');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpGeneralentry');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpGeneralentry');
    }

    public function replicate(AuthUser $authUser, MpGeneralentry $mpGeneralentry): bool
    {
        return $authUser->can('Replicate:MpGeneralentry');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpGeneralentry');
    }

}