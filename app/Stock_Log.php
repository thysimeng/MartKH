<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_Log extends Model
{
    protected $table = 'stock_log';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
