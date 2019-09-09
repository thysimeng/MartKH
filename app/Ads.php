<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    // protected $primaryKey = 'pid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image' 
    ];
    public $timestamps = true;
}
