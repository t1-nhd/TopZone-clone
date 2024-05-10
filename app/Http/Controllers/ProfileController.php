<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function update(){
        $email = Auth::user()->email;

        $customer = Customer::where('Email', $email)->first();

        return view('profile.index',[
            'customer' => $customer,
        ]);
    }
}
