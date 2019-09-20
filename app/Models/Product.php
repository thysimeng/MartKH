<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function stocks()
    {
        return $this->hasOne('App\Models\Stock', 'product_id');
    }
}
