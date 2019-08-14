<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_name', 'address', 'lat', 'lng'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
