<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
//Product
use App\Models\Product;

class CartController extends Controller
{
     //cart
     public function cart(){
        $auth = auth()->user();

        if (!$auth) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $cart = Cart::where('user_id', $auth->id)->with('product')->orderBy('created_at','ASC')->get();

        return view('main.shop.cart',[
            'title' => 'Cart',
            'auth' => $auth,
            'cart' => $cart,
            
            ]);
    }
    //add_cart
    public function add_cart(Product $product,Request $request){
        
        $quantity= $request->quantity ? $request->quantity : 1 ;
        $user_id= auth()->id();
        $cartt = Cart::where([
            'user_id'=> $user_id,
            'product_id'=> $product->id
        ])->first();
        if($cartt){
            Cart::where([
                'user_id'=> $user_id,
                'product_id'=> $product->id
            ])->update([
                    'quantity' => $cartt->quantity + $quantity,
                     'price' => $product->price * ($cartt->quantity + $quantity),
                ]);
            return redirect()->route('cart.cart')->with('success','Product updated to cart');
        }else{
        $data=[
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price'=>($product->price)*$quantity,
        ];
        if (Cart::create($data)){
            return redirect()->route('cart.cart')->with('success','Product added to cart');
        }
    }
            return redirect()->back()->with('error','Product not added to cart');
    }

    //update_cart
 public function update_cart(Product $product, Request $request)
{
    $quantity = max(1, intval($request->input('quantity'))); // không cho số < 1
    $user_id = auth()->id();

    $cart = Cart::where('user_id', $user_id)
                ->where('product_id', $product->id)
                ->first();

    if ($cart) {
        Cart::where('user_id', $user_id)
            ->where('product_id', $product->id)
            ->update([
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
        ]);


        return redirect()->route('cart.cart')->with('success', 'Đã cập nhật giỏ hàng');
    } else {
        return redirect()->route('cart.cart')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng');
    }
}

    public function delete_cart(Product $product){
        $user_id= auth()->id();
        Cart::where([
            'user_id'=> $user_id,
            'product_id'=> $product->id
        ])->delete();
        return redirect()->route('cart.cart')->with('success','Product deleted from cart');

    }
   
    public function checkout(Request $request)
    {
        $user_id = auth()->id();
        $selected_products = $request->input('selected_products', []);

        if (empty($selected_products)) {
            return redirect()->back()->with('error', 'Bạn chưa chọn sản phẩm để thanh toán.');
        }

        // Lưu trạng thái đã chọn
        Cart::where('user_id', $user_id)
            ->whereIn('product_id', $selected_products)
            ->update(['status' => true]);

        // Chuyển đến trang thanh toán
        Cart::where('user_id', auth()->id())
            ->whereNotIn('product_id', $request->selected_products)
            ->update(['status' => 0]);
    
        return redirect()->route('order.order')->with('success', 'Products updated for checkout!');
    }
    

    
}