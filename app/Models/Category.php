<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'categories_name'
    ];

    public function subCategory(){
        return $this->hasMany('App\Models\Subcategory' , 'category_id' , 'cid');
    }
}
