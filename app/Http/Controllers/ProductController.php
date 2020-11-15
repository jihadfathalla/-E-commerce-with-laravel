<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
use App\ShoppingCart;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        //$shoppingcart =ShoppingCart::all();

        return view('admin/products/index', [
            'products' => $products,
            //'shoppingcart'=>$shoppingcart,
            
        ]);
    }

    public function show()
    {
        $request = request();
        $productId = $request->product;
        $product = Product::find($productId);
         return view('admin/products/show', [
                    'product' => $product,
                    
                ]);
    }    


    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('admin/products/create',[
            'brands' => $brands,
            'categories' =>$categories,
        ]);
    }

    public function store()
    {   
        $request=request();
        $product = new Product;
        $product->name = $request->name;
        $product->ske = $request->ske;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
         if ($request->hasFile('image')) { 
               $image = $request->file('image');
               $filename = time() . '.' . $image->getClientOriginalExtension();
               Image::make($image)->resize(50, 50)->save(public_path('/uploads/images/' . $filename));
                 $product->image = $filename;
                 $product->save();
    }
    $product->save();
            return redirect()->route('product.index');
    }      


    public function edit()
   { 
     $request=request();
     $product_id=$request->product;
     $product= Product::find($product_id); 
     $brands = Brand::all();
     $categories=Category::all();

 return view('admin/products/edit',[
   'product'=>$product,
   'brands'=>$brands,
   'categories'=>$categories,
   ]);
    }

public function update()
{ 
    $request=request();
    $product_id=$request->product;
    $product= Product::find($product_id);
    $product->name = $request->name;
    $product->ske = $request->ske;
    $product->brand_id = $request->brand_id;
    $product->category_id = $request->category_id;
    if ($request->hasFile('image')) { 
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(50, 50)->save(public_path('/uploads/images/' . $filename));
        $product->image = $filename;
        $product->save();
    }
    $product->save();

    return redirect()->route('product.index');
}


public function destroy()
{ 
 $request=request();
 $product_id=$request->product;
 $product= Product::find($product_id); 
 $product->delete();

 return redirect()->route('product.index');

 }
 public function shopping_cart()
 {
     $categories = Category::all();
     $brands=Brand::all();
     $request = request();
     $userId = Auth::id();
     $user = User::find($userId); 
     $shopping = ShoppingCart::all();
     dd($shopping);
     $Aprofcat =$profcat->toArray();
     $cats = [];
     foreach($Aprofcat as $catz) {
         foreach ($catz as $cc=> $c) {
             if ($cc=='id'){
          array_push($cats, $c );
             }
     }
     }
     return view('professionals/profcat', [
         'categories' => $categories,
         'cats' => $cats 
     ]);
 }

  
 public function attach(Request $request)
 {
     $request = request();
     $catid  = request()->cat;
     $cat = Category::findOrFail($catid);
     $profId = Auth::id();
     $prof = User::find($profId);
     $prof->categories()->attach($cat); 
     return redirect()->route('profcat');

 }


public function detach(Request $request)
 {
     $request = request();
     $catid  = request()->cat;
     $cat = Category::findOrFail($catid);
     $profId = Auth::id();
     $prof = User::find($profId);
     $prof->categories()->detach($cat); 
     return redirect()->route('profcat');

 }


}
