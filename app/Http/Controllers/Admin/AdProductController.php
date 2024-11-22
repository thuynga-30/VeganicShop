<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
            'origin'=>'',
            'quantity'=>'',
            'description' => 'required',
            'basic_des'=>'',
            'category_id'=>'required|exists:categories,id'
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
            $request->image->move(public_path('assets/img'),$image_name);
            $data['image']=$image_name; 
        } 
       
        if($product->update($data)){
            return redirect()->route('admin.product_manager')->with('success','Product added successfully');
            
        }
            return redirect()->back()->with('no','Product added successfully');
 
    
    }
}
