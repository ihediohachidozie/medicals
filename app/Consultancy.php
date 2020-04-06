<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultancy extends Model
{
    //
    protected $guarded = [];
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class);
    }
    public function laboratories()
    {
        return $this->hasMany(Laboratory::class);
    }
    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class);
    }
}
