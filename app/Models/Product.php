<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function stocks()
    {
        return $this->hasMany('App\Model\Stock', 'product_id');
    }
}
