<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;


class Category extends Model
{
    protected $fillable = ['name','brand_id'];

    
    public function brands()
{
    return $this->belongsToMany(Brand::class, 'categories_brands');
}
}

