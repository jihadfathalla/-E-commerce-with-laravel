<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Brand;
use App\ShoppingCart;



class CategotyController extends Controller
{
    public function index()
    {
        // admin only view all have categories             
        $categories = Category::all();
        $choppingcart =ShoppingCart::all();

        return view('admin/categories/index', [
            'categories' => $categories,
            'choppingcart'=>$choppingcart,
            
        ]);
    }

    public function show()
    {dd('one');
        $request = request();
        $categoryId = $request->category;
        $category = Category::find($categoryId);
         return view('admin/categories/show', [
                    'category' => $category,
                    
                ]);
    }    


    public function create()
    {
        $brands=Brand::all();
        return view('admin/categories/create',[
            'brands' => $brands,
        ]);
    }

    public function store()
    {
        $request = request();
        Category::create([
                'name' => $request->name,
                'brand_id' =>$request->brand_id,
            ]);
            return redirect()->route('category.index');
    }      


    public function edit()
   { 
     $request=request();
     $category_id=$request->category;
     $category= Category::find($category_id); 
     $brands = Brand::all();

 return view('admin/categories/edit',[
   'category'=>$category,
   'brands'=>$brands,
   ]);
    }

public function update()
{
  $request=request();  
  $category_id=$request->category;
  $category= Category::find($category_id); 

    $category->update($request->all());

    return redirect()->route('category.index');
}


public function destroy()
{ 
 $request=request();
 $category_id=$request->category;
 $category= Category::find($category_id); 
 $category->delete();

 return redirect()->route('category.index');

 }


    
}



