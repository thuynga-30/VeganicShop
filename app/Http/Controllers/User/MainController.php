<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Import Mail để gửi email
use App\Models\User;
//contactmail
use App\Mail\ContactMail;
use App\Models\Comment;
use App\Models\Product;


class MainController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=> ['index','about','product','logout']]);
    }
    public function index(){
        $randomProducts = Product::inRandomOrder()->limit(6)->get();
        $comment = Comment::inRandomOrder()->limit(3)->get();
        return view('main.shop.index',[
            'title' => 'VeganicShop',
            'randomProducts' => $randomProducts,
            'comment' => $comment,
        ]);
    }
   
    public function logout(){
        Auth::logout();
        return redirect()->route('index'); 
    }
    
    //about
    public function about(){
        return view('main.shop.about',[
            'title' => 'About Us'
        ]);
    }
    //profile
    public function profile(){
        $user = Auth::user();
        return view('main.shop.profile',[
        'title' => 'Profile',
        'user' => $user
        ]);
    }
  
    public function updateProfile(Request $request)
    {
        // Lấy thông tin người dùng đang đăng nhập
        
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated');
        }
    
        // Validate dữ liệu
        $validated=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'password'=> '',
        ]);
        // $user = User::findOrFail($id);
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
            return redirect()->route('profile')->with('success', 'Profile updated successfully');
        // }
    
    }
            

    //contact
    public function contact(){
        return view('main.shop.contact',[
            'title' => 'Contact Us'
        ]);
    }
    //contact_store
    public function contact_store(Request $request)
    {
    // Validate the input data
    $request->validate([
        'name' => 'required',
        'phone' => '',
        'email' => 'required|email',
        'content' => 'required|string|min:5',
    ]);
    //name
    $name = $request->input('name');
    $phone = $request->input('phone');
    $email = $request->input('email');
    $content = $request->input('content');
    $admin='veganicshopa@gmail.com';
        // Send the email
        Mail::to($admin)->send(new ContactMail($name,$phone,$email, $content));
        return redirect()->route('index')->with('success', 'Send Success');
    
        // Handle the error if email fails to send
        return redirect()->route('contact')->with('error', 'Failed to send email. Please try again.');
    
}



}