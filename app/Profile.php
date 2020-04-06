<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];

    public function Patient()
    {
        return $this->belongsTo(Patient::class);  
    }
}
