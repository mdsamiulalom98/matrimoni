<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $guard = 'member';
    protected $guarded = [];
    
    public function memberinfo()
    {
        return $this->hasOne(MemberInfo::class, 'member_id');
    }
    public function membercareer()
    {
        return $this->hasOne(MemberCareer::class, 'member_id');
    }
    public function membereducation()
    {
        return $this->hasOne(MemberEducation::class, 'member_id');
    }
    public function memberlocation()
    {
        return $this->hasOne(MemberLocation::class, 'member_id');
    }
    public function memberimage()
    {
        return $this->hasOne(MemberImage::class, 'member_id');
    }
}
