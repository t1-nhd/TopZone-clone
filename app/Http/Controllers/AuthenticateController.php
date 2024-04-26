<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('authenticate.login');
    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->Email, 'password' => $request->Password])){
            $request->session()->put('email', $request->Email);
            return redirect()->route('index')->with('login-checked', 'Đăng nhập thành công!');
        }
        return redirect()->route('show-login')->with('login-failed', 'Email hoặc Mật khẩu không đúng!');
    }
    public function showRegistration(){
        return view('authenticate.registration');
    }
    public function registration(Request $request){

        $email = request()->input('Email');
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('email-exist', 'Email đã tồn tại');
        }
        else{
            $user = new User();
            $customer = new Customer();

            $password = bcrypt($request->Password);

            $user->email = $request->Email;
            $user->password = $password;
            $user->account_type = 0;
            $user->save();

            $customer->LastName = $request->LastName;
            $customer->FirstName = $request->FirstName;
            $customer->Email = $request->Email;
            $customer->Phone = $request->Phone;
            $customer->save();

            return redirect()->route('show-login')->with('register-successfully', 'Đăng ký thành công!');
        }
    }
}
