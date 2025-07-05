<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function product(){
        $page= Product::paginate(3);
        return view('main.shop.product',[
            'title' => 'Product',
            
        ],compact('page'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function product_details(Product $product) {
        $randomProducts = Product::inRandomOrder()->limit(4)->get();
        $comments= Comment::where('product_id',$product->id)->get();
        return view('main.shop.product-detail', [
            'title' => 'Product Details',
            'product' => $product, // Dữ liệu của sản phẩm
            'randomProducts' => $randomProducts,
            'comments' => $comments,
        ]);
    }
    //search
    public function search(Request $request){

        // Lấy dữ liệu từ request
        $searchName = $request->input('search_name');
        $searchType = $request->input('search_type');
        $searchOrigin = $request->input('search_origin');
        if (empty($searchName) && empty($searchType) && empty($searchOrigin)) {
            // Trả về view với thông báo không có sản phẩm nào
            return view('main.shop.search', [
                'title' => 'Product',
                'product' => collect(), // Truyền một collection rỗng
            ]);
        }
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
    //comment
    public function add_comment(Product $product,Request $request){
        $request->validate([
            'comment' => 'required',
        ]);
        $data= $request->only('comment');
        $data['product_id']=$product->id;
        $data['user_id']=Auth::id();
        Comment::create($data);
        return redirect()->back()->with('success','Comment added successfully');
    }
    public function delete_comment(Comment $comment){
        // Kiểm tra xem người dùng hiện tại có phải là chủ sở hữu bình luận không
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        // Xóa bình luận
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    public function edit_comment(Request $request, Comment $comment)
    {
        // Kiểm tra quyền chỉnh sửa
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }
    
        // Xác thực dữ liệu
        $request->validate([
            'comment' => 'required|string',
        ]);
    
        // Cập nhật bình luận
        $comment->update([
            'comment' => $request->comment,
        ]);
    
        return redirect()->back()->with('success', 'Comment updated successfully');
    }
    
}
