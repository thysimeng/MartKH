<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customize_Frans extends Model
{
    protected $table = 'customize_frans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','basicColor','gradientColor','logo','darkMode'
    ];
    public $timestamps = true;
}
