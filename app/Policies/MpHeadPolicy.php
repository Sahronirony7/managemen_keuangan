<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MpHead;
use Illuminate\Auth\Access\HandlesAuthorization;

class MpHeadPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MpHead');
    }

    public function view(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('View:MpHead');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MpHead');
    }

    public function update(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('Update:MpHead');
    }

    public function delete(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('Delete:MpHead');
    }

    public function restore(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('Restore:MpHead');
    }

    public function forceDelete(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('ForceDelete:MpHead');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MpHead');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MpHead');
    }

    public function replicate(AuthUser $authUser, MpHead $mpHead): bool
    {
        return $authUser->can('Replicate:MpHead');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MpHead');
    }

}