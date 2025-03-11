<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCareer extends Model
{
    protected $guarded = [];
    
    public function profession()
    {
        return $this->belongsTo(Profession::class)->select('id', 'title');
    }
}
