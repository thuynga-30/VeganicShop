<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
//Product
use App\Models\Product;

class CartController extends Controller
{
     //cart
     public function cart(){
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $cart = Cart::where('user_id', $user->id)->with('product')->get();

        // return view('cart.index', compact('cart'));
        // $cart= Cart::orderBy('created_at','ASC')->get();
        return view('main.shop.cart',[
            'title' => 'Cart'
            ],compact('cart'));
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
            //->increment('quantity',$quantity);
            // $cartt
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
    public function update_cart(Product $product,Request $request){
        
        $quantity= $request->quantity ? floor($request->quantity): 1 ;
        $user_id= auth()->id();
        $cart = Cart::where('user_id',$user_id)
            ->where('product_id', $product->id)
            ->first();
            if($cart){
                Cart::where([
                    'user_id'=> $user_id,
                    'product_id'=> $product->id
                    ])->update([
                        'quantity' => $quantity,
                        'price' => $product->price * $quantity,
                    ]);
                    return redirect()->route('cart.cart')->with('success','Product updated to cart');
            }else{
                return redirect()->route('index')->with('error','Product not found in cart');
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
    // Validate that at least one product is selected
    $request->validate([
        'selected_products' => 'required|array',
    ]);

    // Update the status of selected products
    foreach ($request->selected_products as $productId) {
        Cart::where('user_id', auth()->id())
            ->where('product_id', $request->selected_products)
            ->update(['status' => 1]);
    
    }
    // Optionally, reset status of unselected products to 0
    Cart::where('user_id', auth()->id())
        ->whereNotIn('product_id', $request->selected_products)
        ->update(['status' => 0]);

    // Redirect to the checkout page
    return redirect()->route('order.order')->with('success', 'Products updated for checkout!');

    // return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
