<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];


    public function educations(){
        return $this->hasMany(Education::class);
    }

    
    
}
