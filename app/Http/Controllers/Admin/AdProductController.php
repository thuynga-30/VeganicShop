<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdProductController extends Controller
{
    // //product_manager
    public function product_manager(){
        return view('main.admin.product-manager',[
            'title' => 'Product Manager'
        ]);
    }
    //edit
   
  
    //save_product
    public function save_product(Request $request){
        $request->validate([
            'name' => 'required|unique:products',
            'image' => 'file|mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric',
            'origin'=>'required',
            'quantity'=>'required',
            'description' => 'required',
            'basic_des'=>'required',
            'category_id'=>'required|exists:categories,id'
        ],[
            'name.required' => 'Please enter product name',
            'name.unique' => 'Product name already exist',
            'image.file' => 'Please select image',
            'price.required' => 'Please enter product price',
            'price.numeric' => 'Please enter valid price',
            'origin.required' => 'Please enter product origin',
            'quantity.required' => 'Please enter product quantity',
            'description.required' => 'Please enter product description',
            'basic_des.required' => 'Please enter product basic description',
            'category_id.required' => 'Please select category',
            'category_id.exists' => 'Category not found'

        ]);
        $data=$request->only('name','price','type','origin','quantity','description','basic_des','category_id');
        $image_name= $request->image->getClientOriginAlName();
        $request->image->move(public_path('assets/img'),$image_name);
        $data['image']=$image_name;  
        if(Product::create($data)){
            return redirect()->route('admin.product_manager')->with('success','Product added successfully');
            
        }
            return redirect()->back()->with('no','Product added successfully');
 
    }
    
    //product_delete
    public function product_delete(Product $product){
        if($product->delete()){
            return redirect()->route('admin.product_manager')->with('success','Product deleted successfully');
        }
        return redirect()->back()->with('no','Product deleted unsuccessfully');

    }
    //product_edit
    public function product_edit(Product $product){
        return view('main.admin.edit-product',[
            'title' => 'Product Edit',
            'product' => $product
        ]);
    }
    public function update_product(Request $request,Product $product){
        $request->validate([
            'name' => 'required|unique:products,name,'. $product->id,
            'image' => 'file|mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric',
            'origin'=>'required',
            'quantity'=>'required',
            'description' => 'required',
            'basic_des'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);
        $data = $request->only('name','price','origin','quantity','description','basic_des','category_id');
        if($request->hasFile('image')){
            $image_name= $request->image->getClientOriginAlName();
            $request->image->move(public_path('assets/img/products'),$image_name);
            $data['image']=$image_name; 
        } 
       
        if($product->update($data)){
            return redirect()->route('admin.product_manager')->with('success','Product added successfully');
            
        }
            return redirect()->back()->with('no','Product added successfully');
 
    
    }
    public function order_manager(){
        $order=Order::all();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $totalRevenueToday = DB::table('totalrevenueview')
        ->whereBetween('order_date', [$startOfWeek, $endOfWeek])
        ->sum('total_amount');
        $orderCount= Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        // dd($totalRevenueToday);
        return view('main.admin.order-manager',[
            'title' => 'Order Manager',
            'orders' => $order,
            'totalRevenueToday' => $totalRevenueToday,
            'orderCount' => $orderCount,
        ]);
    }
    public function order_delete(Order $order){
        $oderDetail = OrderDetail::where('order_id',$order->id)->delete();
        if($oderDetail){ 
        if($order->delete()){
            return redirect()->route('admin.order_manager')->with('success','Product deleted successfully');
        }
        return redirect()->back()->with('no','Product deleted unsuccessfully');
    }
    }
}
