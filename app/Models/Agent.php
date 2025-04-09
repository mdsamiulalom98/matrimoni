<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Agent extends Authenticatable
{
    protected $guard = 'agent';
    protected $guarded = [];
}
