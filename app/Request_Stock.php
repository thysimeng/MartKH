<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_Stock extends Model
{
    protected $table = 'request_stocks';

    protected $fillable = [
        'product_id', 'franchise_id', 'amount', 'status',
    ];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function franchise()
    {
        return $this->belongsTo('App\Models\Franchise');
    }
}
