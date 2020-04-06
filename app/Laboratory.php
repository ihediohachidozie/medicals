<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    //
    protected $guarded = [];
    
    public function consultancy()
    {
        return $this->belongsTo(Consultancy::class);
    }
}
