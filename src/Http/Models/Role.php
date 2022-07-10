<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];
    protected $table = 'roles';
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
