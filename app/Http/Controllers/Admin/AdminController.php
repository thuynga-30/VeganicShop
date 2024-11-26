<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccount;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        $userss = User::all();
        return view('main.admin.user-manager',[
            'title' => 'User Manager',
            'users' => $userss,
        
        ]);
    }
   
            //add_user_process
    public function add_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone'=>'min:10',
            'dob'=>'',
            'address'=>'',
            'gender'=>'',

        
        ]);
        $data=$request->only('name','email','phone','dob','address','gender');
        $data['password']=bcrypt($request->password);
        if($acc=User::create($data)){
            Mail::to($acc->email)->send (new VerifyAccount($acc));
        return redirect()->route('admin.user_manager')->with('success','User added successfully');
        } else{
            return redirect()->route('admin.user_manager')->with('error','Failed to add user');
        }
       
    }
   //edit_user
   public function edit_user($id){
        $user=User::find($id);
        return view('main.admin.edit-user',[
            'title' => 'Edit User',
            'user' => $user,
            ]);
    }
//     public function updateUser(Request $request){
//     $user= User::where('email',$request->email);
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email',
//         'phone' => 'required|digits:10',
//         'password' => 'required|min:6',
//         'dob' => 'required|date',
//         'gender' => 'required|in:male,female',
//         'address' => 'required|string|max:255',
//     ]);

//     // Chuẩn bị dữ liệu để update
//     $data = $request->only(['name', 'email', 'phone', 'dob', 'gender', 'address']);


//     // Cập nhật dữ liệu
//     if ($user->update($data)) {
//         return redirect()->route('admin.user_manager')->with('success', 'Profile updated successfully');
//     }
//             return redirect()->back()->with('error', 'Failed to update profile');
// }
//     // Validate dữ liệu
public function updateUser(Request $request,$id){
    // try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'nullable|string|max:15',
            'address'=>'nullable|string',
            'gender'=>'nullable|in:male,female',
            'dob'=>'nullable|date',
            

        ]);

        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->gender = $validated['gender'];
        $user->dob = $validated['dob'];
        if($request->has('password')){
            $user->password = bcrypt($request->password);
            }
        $user->save();

        return redirect()->route('admin.user_manager')->with('success', 'Cập nhật thông tin người dùng thành công!');
//     } catch (\Exception $e) {
//         Log::error('Error updating user: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật người dùng. Vui lòng thử lại.');
    
// }
}


    public function user_delete(User $user){
       
        // Lấy danh sách các đơn hàng liên quan đến user
    $orders = Order::where('user_id', $user->id)->get();

    // Xóa tất cả chi tiết đơn hàng liên quan đến các đơn hàng này
    foreach ($orders as $order) {
        OrderDetail::where('order_id', $order->id)->delete();
    }

    // Xóa tất cả đơn hàng liên quan đến user
    $orderDeleted = Order::where('user_id', $user->id)->delete();

    // Xóa user nếu tất cả liên quan đã xóa thành công
    if ($orderDeleted) {
        if ($user->delete()) {
            return redirect()->route('admin.user_manager')->with('success', 'User deleted successfully');
        }
    }
        return redirect()->route('admin.user_manager')->with('error','Failed to delete user');

    
}


   
    //order_manager
   

}
