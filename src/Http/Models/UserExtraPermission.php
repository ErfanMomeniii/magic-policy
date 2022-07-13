<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $permission_id
 * @property mixed $user_id
 */
class UserExtraPermission extends Model
{
    protected $fillable = ['title', 'permission_id', 'user_id'];
    protected $table = 'user_extra_permissions';
    public $timestamps = false;
}

