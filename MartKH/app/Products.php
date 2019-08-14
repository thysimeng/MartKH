<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'image','code', 'name', 'description', 'price', 'size','brand','country','subcategory_id'
    ];
    public $primarykey = 'pid';
    public $timestamps = true;
}
