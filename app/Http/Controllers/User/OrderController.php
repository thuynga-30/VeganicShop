<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
       
        
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->with('product')->get();
            $selectedItems = Cart::where('user_id', $user->id)
            ->where('status', 1)
            ->with('product') // Eager load thông tin sản phẩm
            ->get();
    
        if ($selectedItems->isEmpty()) {
            return redirect()->route('cart.cart')->with('error', 'Please select at least one product to proceed to checkout.');
        }
    
           // $cart = Cart::where('user_id', $user->id)->with('product')->get();
            return view('main.shop.checkout',[
                'title' => 'CheckOut',
                'cart' => $cart,
                'user' => $user,
                'selectedItems' => $selectedItems,
                
            ]);
    }
    public function checkout(Request $request){
        $user = auth()->user();
        $request->validate([
                    'name'=>'required',
                    'email'=>'required',
                    'address' => 'required',
                    'phone' => 'required',
                ]);
        $selectedItems = Cart::where('user_id', $user->id)
        ->where('status', 1)
        ->get();
        if ($selectedItems->isEmpty()) {
            return redirect()->route('cart.cart')->with('error', 'Please select at least one product
            to proceed to checkout.');
        }
        $data = $request->only('name','email','address','phone');
        $data['user_id'] = $user->id;
        if($order = Order::create($data)) {
            foreach ($selectedItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    ]);
                }
                Cart::where('user_id', $user->id)
                ->where('status', 1)
                ->delete();
                return redirect()->back()->with('success', 'Your order has been placed successfully!');

            }
        
    }
    // public function order(){
       
    //     $user = auth()->user();
    //     $cart = Cart::where('user_id', $user->id)->with('product')->get();
    //     return view('main.shop.checkout',[
    //         'title' => 'CheckOut',
    //         'cart' => $cart,
    //         'user' => $user,
            
    //     ]);
    // }
    // public function checkout(Request $request){
    //     $user = auth()->user();
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //     ]);
    //      // Lấy danh sách sản phẩm được chọn từ request
        
    //      $data = $request->only('name','email','address','phone');
    //     $data['user_id'] = $user->id;
    //     if($order = Order::create($data)) {
    //         foreach( $user->carts as $cart ) {
                
    //             $data1 =[
    //                 'order_id' => $order->id,
    //                 'product_id' => $cart->product_id,
    //                 'quantity' => $cart->quantity,
    //                 'price' =>$cart->price
    //             ];
    //             OrderDetail::create($data1);
    //         }
    //         //$user->carts()->delete();
    //         return redirect()->back()->with('success','Đặt hàng thành công');
    //     }
    //         // $user->carts()->delete();

        
    // }
           

}