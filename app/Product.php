<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\ChoppingCart;


class Product extends Model
{
    protected $fillable = ['name,image,ske,category_id,brand_id'];


    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
      //  return $this->belongsToMany(User::class, 'shopping_cart');
        return $this->belongsToMany('App\User');

    }
}
