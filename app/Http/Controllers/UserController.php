<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Str;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
use App\ShoppingCart;
use Intervention\Image\Facades\Image;



class UserController extends Controller
{
    
    public function index()
    {            
        $customers = User::whereHas("roles", function ($q) {
            $q->where("name", "user");
        })->get();
        return view('admin/users/index', [
            'customers' => $customers,
        ]);
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(8)),
            ]);
            $customer->assignRole('user');
            $customer->save();

        $token=app('auth.password.broker')->createToken($customer);
        $customer->sendPasswordResetNotification($token);

            return redirect()->route('user.index');
        }
    

    public function show()
    {
        $request = request();
        $userId = request()->user;
        $user = User::find($userId);
        if (auth()->user()->hasRole('super-admin')) {
            return view('admin.users.show', [
                'user' => $user,
            ]);
        } elseif (auth()->user()->hasRole('user')) {
            return view('customers.show', [
                'user' => $user,
            ]);
        }
    }
    

    public function edit()
    {
        $request=request();
        $user_id=$request->user;
        $user= User::find($user_id); 
            return view('admin.users.edit', [
                'user' => $user,
            ]);

        }
    


    public function update(UpdateUserRequest $request)
    {
        
        $user_id=$request->user;
        $user= User::find($user_id); 
        if (auth()->user()->hasRole('super-admin')) {
            $data = $request->only([
                'name',
                'email',
            ]);
            $user->update($data);
            $user->save();
            return redirect()->route('user.index');
        } elseif (auth()->user()->hasRole('user')) {
            $user->save();
            return redirect()->route('customer.show', [
                'user' => $user     
            ]);
        }
    }   
    
    

    public function destroy($id)
    {
        $request=request();
        $user_id=$request->user;
        $user= User::find($user_id); 
        $user->delete();
            return redirect()->route('user.index');
    }      
    
}
