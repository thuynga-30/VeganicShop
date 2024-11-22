<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import User model
use App\Models\UserResetToken; //Import UserResetToken model
use Illuminate\Support\Str; // Import Str để tạo token
use Illuminate\Support\Facades\Mail; // Import Mail để gửi email
use App\Mail\VerifyAccount; // Import mail để gửi xác nhận
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Hash;

class AccountController extends Controller
{
    public function signup()
    {
        return view('users.log-sign.signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function save(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:users',
            'password' => 'required|min:4',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 6 characters',
            'name.max' => 'Name must not be more than 100 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',
            'email.min' => 'Email must be at least 6 characters',
            'email.max' => 'Email must not be more than 100 characters',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 4 characters',
        ]);

       $data =$request->only('name','email','role','phone','address','gender');
       $data['password'] = bcrypt($request->password);
        if ($acc=User::create($data)){
            Mail::to($acc->email)->send (new VerifyAccount($acc));
            return redirect()->route('login')->with('ok','Register successfully, check your email to verify account');
        }  else{
            return redirect()->back()->with('error','Register failed');
        }

    }

    public function verify($email)
    {
        $acc=User::where('email',$email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email',$email)->update(['email_verified_at' => now()]);
        return redirect()->route('login')->with('ok','Verify account successfully, You can login now');
    }

    public function login()
    {
        return view('users.log-sign.login', [
            'title' => 'Login'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        $data= $request->only('email','password');
        $remember=true;
        $check = auth()->attempt($data,$remember);
        if ($check){
            if (auth()->user()->email_verified_at == null)
            {
                auth()->logout();
                return redirect()->back()->with('error','Your account is not verified yet');
            } else{
                if (Auth::user()->role == 'admin'){
                    return redirect()->route('admin.admin');
                } else {
                    return redirect()->route('index');
                }
        }
        } else{
            return redirect()->back()->with('error','Email or password is incorrect');
        }

    }

   

    public function forgotPass()
    {
        return view('users.log-sign.forgot-pass', [
            'title' => 'Forgot Pass'
        ]);
    }
    public function check_forgot(Request $request){
        $request->validate([
            'email' => 'required|exists:users'
        ]);
        $user =User::where('email',$request->email)->first();
        $token = Str::random(50);
        $token_data= [
            'email' => $request->email,
            'token' => $token
        ];
        if (UserResetToken::create($token_data)){
        Mail::to($request->email)->send(new ForgotPassword($user,$token));
        return redirect()->back()->with('success','Check your email to reset your password');

        }
        return redirect()->back()->with('no','Something wrong, Check your email again');

    }
    public function resetPass($token){
        $tokenData = UserResetToken::where('token',$token)->firstOrFail();
        return view('users.log-sign.reset-pass', [
            'title' => 'Reset Pass',
            'token' => $token
            ]);
    }
    public function Check_resetPass($token){
        
        request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
            
        ]);
        $tokenData = UserResetToken::where('token',$token)->firstOrFail();
        $user = User::where('email',$tokenData->email);//->firstOrFail(); //trỏ trực tiếp
         // Check if the token has expired (optional)
        // $user = $tokenData->user;
        $data=[
            'password' => bcrypt(request('password')),
        ];
        $check=$user->update($data);
        if ($check){
            UserResetToken::where('email',$tokenData->email)->delete();
            return redirect()->route('login')->with('success','Reset password successfully');
            }
            return redirect()->back()->with('no','Something wrong, Check your email again');
            
    }
}


