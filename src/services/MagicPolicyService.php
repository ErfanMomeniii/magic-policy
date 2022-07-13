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
    }

    public function addPermissionToRole(Permission $permission, Role $role)
    {
        $role->permissions()->attach($permission->id);
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
        $userExtraPermission->save();
    }

    /**
     * @throws \Exception
     */
    public function checkPermissionForUserByTitle($title, User $user = null)
    {
        if ($user == null) {
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                throw new \Exception();
            }
        }

        $permission = Permission::where('title', '=', $title)->firstOrFail();

        return $this->checkPermissionForUser($permission, $user);
    }

    public function checkPermissionForUser(Permission $permission, User $user = null)
    {
        if ($user == null) {
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                throw new \Exception();
            }
        }

        $answer = false;

        if (config('magicpolicy.check_extra_permissions')) {
            $answer = UserExtraPermission::where('user_id', '=', $user->id)
                ->where('permission_id', '=', $permission->id)->firstOrFail() != null ? true : $answer;
        }

        $roles = $permission->roles();

        foreach ($roles as $role) {
            $foundUsers = $role->users();
            foreach ($foundUsers as $foundUser) {
                if ($foundUser->id == $user->id) {
                    return true;
                }
            }
        }

        return $answer;
    }
}