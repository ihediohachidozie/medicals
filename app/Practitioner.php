<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Practitioner extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getSpecialtyAttribute($attribute)
    {
        return [
            0 => 'Family Medicine',
            1 => 'Emergency Medicine',
            2 => 'General Surgery',
            3 => 'General Practitoner',
            4 => 'Preventive Healthcare'
        ][$attribute];
    } 

    protected $guard = 'practitioner';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function consultancies()
    {
        return $this->hasMany(Consultancy::class);
    }
}
