<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::orderBy('BillId', 'desc')->get();
        
        // return $bills;
        return view('admin.bills.index', [
            'data' => $bills,
        ]);
    }
    public function show($id){
        $bill = Bill::findOrFail($id);
        $customer = Customer::findOrFail($bill->CustomerId);
        $bill_details = DB::table('bill_details')
                        ->join('products', 'products.ProductId', '=', 'bill_details.ProductId')
                        ->where('BillId', $bill->BillId)
                        ->get();
        $bill_status = ['Pending', 'Approve', 'Reject', 'Shipping'];
        
        return view('admin.bills.show',[
            'bill' => $bill,
            'customer' => $customer,
            'details' => $bill_details,
            'status' => $bill_status
        ]);
    }

    public function update(Request $request){
        // dd($request->all());
        DB::table('bills')->where('BillId', $request->BillId)->update(['Status' => $request->Status,]);
        return redirect()->back()->with('update-success', 'Cập nhật trạng thái thành công');
    }
}
