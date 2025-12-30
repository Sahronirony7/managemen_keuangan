<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpPiutang;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpPiutangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpPiutang');
    }

    public function view(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('View:MpPiutang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpPiutang');
    }

    public function update(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('Update:MpPiutang');
    }

    public function delete(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('Delete:MpPiutang');
    }

    public function restore(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('Restore:MpPiutang');
    }

    public function forceDelete(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('ForceDelete:MpPiutang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpPiutang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpPiutang');
    }

    public function replicate(AuthUser $authUser, MpPiutang $mpPiutang): bool
    {
        return $authUser->can('Replicate:MpPiutang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpPiutang');
    }

}