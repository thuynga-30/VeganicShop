<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str để tạo token

class AdminController extends Controller
{
    public function admin(){
        return view('main.admin.main',[
            'title' => 'Admin',
        ]);
    }
   
    //user_manager
    public function user_manager(){
        return view('main.admin.user-manager',[
            'title' => 'User Manager',
        
        ]);
    }
   
            //add_user_process
    public function add_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone'=>'min:10',
            'dob'=>'',
            'address'=>'',
            'gender'=>'',
        ],[
            'name.required'=>'Please enter your name',
            'email.required'=>'Please enter your email',
            'email.email'=>'Please enter valid email',
            'email.unique'=>'Email already exist',
            'password.required'=>'Please enter your password',
            'password.min'=>'Password must be at least 8 character',
            'phone.min'=>'Phone number must be at least 10 digit',
        ]);
        $data=$request->only('name','email','phone','dob','address','gender');
        $data['password']=bcrypt($request->password);
        $acc=User::create($data);
        if($acc){
        return redirect()->route('admin.user_manager')->with('success','User added successfully');
        } else{
            return redirect()->route('admin.user_manager')->with('error','Failed to add user');
        }
       
    }
   
    public function update_user(Request $request)
    {
        // Lấy thông tin người dùng đang đăng nhập
        
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated');
        }
    
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
        ]);
    
        // Chuẩn bị dữ liệu để update
        $data = $request->only(['name', 'email', 'phone', 'dob', 'gender', 'address']);
    
        // Cập nhật dữ liệu
        if ($user->update($data)) {
            return redirect()->route('profile')->with('success', 'Profile updated successfully');
        }
        return redirect()->back()->with('error', 'Failed to update profile');
    }

    public function user_delete(User $user){
        if($user->delete()){
            return redirect()->route('admin.user_manager')->with('success','User deleted successfully');
        }
        return redirect()->route('admin.user_manager')->with('error','Failed to delete user');

    }


   
    //order_manager
    public function order_manager(){
        // $user =  User::orderBy('id','ASC')->get();
        // $cart = Cart::where('user_id', $user->id)->with('product')->get();
        return view('main.admin.order-manager',[
            'title' => 'Order Manager'
        ]);
    }
}
