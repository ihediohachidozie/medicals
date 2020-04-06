<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //
    protected $guarded = [];
    
    public function consultancy()
    {
        return $this->belongsTo(Consultancy::class);
    }
}
