<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestNotification extends Model
{
    protected $table = 'request_stocks';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function franchise()
    {
        return $this->belongsTo('App\Models\Franchise');
    }
}
