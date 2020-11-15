<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function categories()
{
    return $this->belongsToMany(Category::class, 'categories_brands');
}
}
