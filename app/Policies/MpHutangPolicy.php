<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpHutang;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpHutangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpHutang');
    }

    public function view(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('View:MpHutang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpHutang');
    }

    public function update(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('Update:MpHutang');
    }

    public function delete(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('Delete:MpHutang');
    }

    public function restore(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('Restore:MpHutang');
    }

    public function forceDelete(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('ForceDelete:MpHutang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpHutang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpHutang');
    }

    public function replicate(AuthUser $authUser, MpHutang $mpHutang): bool
    {
        return $authUser->can('Replicate:MpHutang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpHutang');
    }

}