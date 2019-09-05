<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchises';

    public function stockRequest()
    {
        return $this->belongsTo('App\Models\RequestNotification');
    }
}
