<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    // protected $primaryKey = 'pid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','code', 'name', 'description', 'price', 'size','brand','country'
    ];
    public $timestamps = true;
}
