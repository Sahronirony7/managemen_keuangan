<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpSubEntry;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpSubEntryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpSubEntry');
    }

    public function view(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('View:MpSubEntry');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpSubEntry');
    }

    public function update(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('Update:MpSubEntry');
    }

    public function delete(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('Delete:MpSubEntry');
    }

    public function restore(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('Restore:MpSubEntry');
    }

    public function forceDelete(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('ForceDelete:MpSubEntry');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpSubEntry');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpSubEntry');
    }

    public function replicate(AuthUser $authUser, MpSubEntry $mpSubEntry): bool
    {
        return $authUser->can('Replicate:MpSubEntry');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpSubEntry');
    }

}