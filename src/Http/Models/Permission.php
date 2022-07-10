<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['title'];
    protected $table = 'permissions';
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}