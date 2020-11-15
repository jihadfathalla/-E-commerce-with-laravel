<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
use App\ShoppingCart;


class UserController extends Controller
{
    
    public function index()
    {            
        $users = User::all();
        return view('admin/users/index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        return view('admin/users/create', [
        ]);
    }

    public function store()
    {
        $request = request();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= Hash::make(Str::random(8));
        $user->assignRole('user');
        $user->save();

        $token=app('auth.password.broker')->createToken($user);
        $user->sendPasswordResetNotification($token);
            return redirect()->route('user.index');
        }
    

    public function show()
    {
        $request = request();
        $userId = request()->user;
        $user = User::find($userId);
            return view('admin/users/show', [
                'user' => $user
            ]);
       
        }
    

    public function edit($id)
    {
        $request=request();
        $user_id=$request->user;
        $user= User::find($user_id); 
            return view('admin.users.edit', [
                'user' => $user,
            ]);

        }
    


    public function update()
    {
        $request=request();
        $user_id=$request->user;
        $user= User::find($user_id); 
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
            $user->save();
            return redirect()->route('user.index');
        
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
