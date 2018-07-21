<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

    public function Category()
    {
    	return $this->belongsTo('App\Models\Category'); //Or Category::class
    }

    /*public function getCategoriesname()
    {
    	return Category::where('id', $this->category_id)->first()->name;
    }*/
}
