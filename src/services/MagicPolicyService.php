<?php

namespace erfanmomeniii\magicpolicy\services;

use App\User;
use erfanmomeniii\magicpolicy\Http\Models\Permission;
use erfanmomeniii\magicpolicy\http\Models\Role;
use erfanmomeniii\magicpolicy\Http\Models\UserExtraPermission;
use Illuminate\Support\Facades\Auth;

class MagicPolicyService
{
    public function addRoleToUser(Role $role, User $user = null)
    {
        if ($user == null) {
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                throw new \Exception();
            }
        }
        $role->users()->attach($user->id);

        return;
    }

    public function addPermissionToRole(Permission $permission, Role $role)
    {
        $role->permissions()->attach($permission->id);

        return;
    }

    public function addExtraPermissionToUser(Permission $permission, User $user = null)
    {
        if ($user == null) {
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                throw new \Exception();
            }
        }

        $userExtraPermission = new UserExtraPermission();
        $userExtraPermission->permission_id = $permission->id;
        $userExtraPermission->user_id = $user->id;

        return;
    }

    public function checkPermissionForUserByTitle($title,User $user = null){
        if ($user == null) {
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                throw new \Exception();
            }
        }
    }
}