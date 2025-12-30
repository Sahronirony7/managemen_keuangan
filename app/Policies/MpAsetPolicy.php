<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpAset;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpAsetPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpAset');
    }

    public function view(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('View:MpAset');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpAset');
    }

    public function update(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('Update:MpAset');
    }

    public function delete(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('Delete:MpAset');
    }

    public function restore(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('Restore:MpAset');
    }

    public function forceDelete(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('ForceDelete:MpAset');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpAset');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpAset');
    }

    public function replicate(AuthUser $authUser, MpAset $mpAset): bool
    {
        return $authUser->can('Replicate:MpAset');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpAset');
    }

}