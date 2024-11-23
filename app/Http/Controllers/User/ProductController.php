<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    
    public function product(){
        
        return view('main.shop.product',[
            'title' => 'Product',
            
        ]);
    }
    public function product_details(Product $product) {
        $randomProducts = Product::inRandomOrder()->limit(4)->get();
        return view('main.shop.product-detail', [
            'title' => 'Product Details',
            'product' => $product, // Dữ liệu của sản phẩm
            'randomProducts' => $randomProducts
        ]);
    }
    //search
    public function search(Request $request){

       
    
        // Lấy dữ liệu từ request
        $searchName = $request->input('search_name');
        $searchType = $request->input('search_type');
        $searchOrigin = $request->input('search_origin');
    
        // Query sản phẩm
        $query = Product::query();
    
        // Nếu có tìm kiếm, thêm điều kiện vào query
        if ($searchName) {
            $query->where('name', 'LIKE', "%$searchName%");
        }
        if ($searchType) {
            $query->where('category_id', $searchType);
        }
        if ($searchOrigin) {
            $query->where('origin', $searchOrigin);
        }
        $product = $query->paginate(12); 
       
        return view('main.shop.search',[
            'title' => 'Product',
            'product' => $product,
        ]);

    }
}
