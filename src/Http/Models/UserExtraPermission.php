<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserExtraPermission extends Model
{
    protected $fillable = ['title', 'permission_id'];
    protected $table = 'user_extra_permissions';
    public $timestamps = false;
}

