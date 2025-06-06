<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('authenticate.login');
    }
    public function login(Request $request)
    {
        $stickyEmail = User::where([
            'email' => $request->Email,
            'account_type' => 0
        ])->first();

        if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password, 'active' => 1])) {
            if (Auth::user()->account_type == 1 || Auth::user()->account_type == 2) {
                $request->session()->put('email', $request->Email);
                return redirect()->route('admin.index')->with('login-checked', 'Đăng nhập thành công!');
            }
            else{
                $request->session()->put('email', $request->Email);
                return redirect()->route('index')->with('login-checked', 'Đăng nhập thành công!');
            }
        }
        if($stickyEmail) {
            $request->session()->put('email', $request->Email);
        }
        return redirect()->route('show-login', [])->with('login-failed', 'Email hoặc mật khẩu không đúng!');
        // if(User::where('email', $request->Email)->exists()){
            
        // }
        // return redirect()->route('show-login', [
        // ])->with('login-failed', 'Email này có thể đã bị khóa. Vui lòng kiểm tra lại');
    }


    public function showRegistration()
    {
        return view('authenticate.registration');
    }
    public function registration(Request $request)
    {

        $email = request()->input('Email');
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->with('email-exist', 'Email đã tồn tại');
        } else {
            $request->validate([
                'Password' => 'min:8',
                'ConfirmPassword' => 'same:Password'
            ], [
                'Password.min' => 'Mật khẩu phải có ít nhất 8 kí tự.',
                'ConfirmPassword.same' => 'Mật khẩu xác nhận không trùng khớp!'
            ]);
            $user = new User();
            $customer = new Customer();
            $cart = new Cart();

            $password = Hash::make($request->Password);


            // Tạo CustomerId mới dựa trên CustomerId cuối cùng
            $lastCustomer = Customer::orderBy('CustomerId', 'desc')->first();
            if ($lastCustomer) {
                $lastNumber = (int)substr($lastCustomer->CustomerId, 3) + 1;
            } else $lastNumber = 1;
            $newCustomerId = "C" . str_pad($lastNumber, 9, "0", STR_PAD_LEFT);

            // Tạo CartId mới dựa trên CartId cuối cùng
            $lastCart = Cart::orderBy('CartId', 'desc')->first();
            if ($lastCart) {
                $lastNumber = (int)substr($lastCart->CartId, 3) + 1;
            } else $lastNumber = 1;
            $newCartId = "GH" . str_pad($lastNumber, 8, "0", STR_PAD_LEFT);

            //
            $user->email = $request->Email;
            $user->password = $password;
            $user->account_type = 0;
            $user->name = $request->FirstName;
            $user->save();

            $customer->CustomerId = $newCustomerId;
            $customer->LastName = $request->LastName;
            $customer->FirstName = $request->FirstName;
            $customer->Gender = $request->Gender;
            $customer->Email = $request->Email;
            $customer->Phone = $request->Phone;
            $customer->save();

            $cart->CartId = $newCartId;
            $cart->CustomerId = $newCustomerId;
            $cart->save();

            return redirect()->route('show-login')->with('register-successfully', 'Đăng ký thành công!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
