<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Agent extends Authenticatable
{
    protected $guard = 'agent';
    protected $guarded = [];
    public function members()
    {
        return $this->hasMany(Member::class,'agent_id','id')->select('id','name', 'agent_id', 'phone', 'status', 'created_at');
    }
}
