<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index',[
            'data' => $customers
        ]);
    }

    public function show($id)
    {
        $customer = customer::findOrFail($id);
        return view('admin.customers.show',[
            'customer' => $customer,
        ]);
    }
}
