<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    protected $table = 'customize';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','data'
    ];
    public $timestamps = true;
}
