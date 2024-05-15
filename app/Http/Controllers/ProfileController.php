<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile(){
        $email = Auth::user()->email;

        $customer = Customer::where('Email', $email)->first();
        $bills = Bill::where('CustomerId', $customer->CustomerId)->get();
        return view('profile.index',[
            'customer' => $customer,
            'bills' => $bills,
        ]);
    }
    public function edit(){
        $email = Auth::user()->email;

        $customer = Customer::where('Email', $email)->first();

        return view('profile.edit',[
            'customer' => $customer,
        ]);
    }
    public function update(Request $request){
        $email = Auth::user()->email;

        DB::table('customers')->where('Email', $email)->update([
            'LastName' => $request->LastName,
            'FirstName' => $request->FirstName,
            'Phone' => $request->Phone,
            'Address' => $request->Address,
        ]);

        $customer = Customer::where('Email', $email)->first();

        return redirect()->route('profile')->with('update-successfully', 'Cập nhật hồ sơ thành công');
    }
}
