<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
use App\ShoppingCart;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;





class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (auth()->user()->hasRole('super-admin')) {
            return view('admin.products.index', [
                'products' => $products,
            ]);
        } else
            $usertId = Auth::id();
            $user = User::find($usertId);
            $shopping_cart = $user->products->toArray();
            $cu_products = [];

            foreach ($shopping_cart as $sh) {
                foreach ($sh as $key => $value) {
                    if ($key == 'id') {
                        array_push($cu_products, $value);
                    }
                }
            }
            return view('products.index', [
                'products' => $products,
                'cu_products' => $cu_products
            ]);
    }
    public function shopping_cart()
    {       
            $products = Product::all();
            $usertId = Auth::id();
            $user = User::find($usertId);
            $shopping_cart = $user->products->toArray();
            $cu_products = [];

            foreach ($shopping_cart as $sh) {
                foreach ($sh as $key => $value) {
                    if ($key == 'id') {
                        array_push($cu_products, $value);
                    }
                }
            }
            return view('products.shopping_cart', [
                'products' => $products,
                'cu_products' => $cu_products
            ]);
    }
    
    

    public function show()
    {
        $request = request();
        $productId = $request->product;
        $product = Product::find($productId);
        if (auth()->user()->hasRole('super-admin')) {
         return view('admin/products/show', [
                    'product' => $product,
                ]);
        } elseif (auth()->user()->hasRole('user')) {
                return view('products.show', [
                    'product' => $product,
                ]);
            }        
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

    public function store(StoreProductRequest $request)
    {  
        $product = new Product;
        $product->name = $request->name;
        do{$ske=Str::random(10);

        $ske_exist = Product::where('ske', $ske)->get();

          }while(($ske_exist== NULL));

        $product->ske=$ske;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
         if ($request->hasFile('image')) { 
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(50, 50)->save(public_path('/uploads/images/' . $filename));
            $product->image = $filename;
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

public function update(UpdateProductRequest $request)
{ 
    $product_id=$request->product;
    $product= Product::find($product_id);
    if (auth()->user()->hasRole('super-admin'))
    {
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
}


public function destroy()
{ 
 $request=request();
 $product_id=$request->product;
 $product= Product::find($product_id); 
 $product->delete();

 return redirect()->route('product.index');

 }

    
    public function attach()
    {
        $productId = request()->product;
        $product = Product::findOrFail($productId);
        $customerId = Auth::id();
        $customer = User::find($customerId);

        $customer->products()->attach($product);
        return redirect()->route('product.index');
    }

    public function detach()
    {
        $productId  = request()->product;
        $product = Product::findOrFail($productId);
        $customerId = Auth::id();
        $customer = User::find($customerId);
        $customer->products()->detach($product);
        return redirect()->route('product.index');
    }


}
