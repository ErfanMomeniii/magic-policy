<?php

namespace erfanmomeniii\magicpolicy\Http\Models;

use App\User;
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

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
