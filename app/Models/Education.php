<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $guarded = [];


    public function level(){
        return $this->belongsTo(Level::class);
    }
    
    
}
