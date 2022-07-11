<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
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