<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    //
    protected $guarded = [];
    
    public function Patient()
    {
        return $this->belongsTo(Patient::class);  
    }
}
