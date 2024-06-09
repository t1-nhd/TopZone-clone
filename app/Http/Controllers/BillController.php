<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BillController extends Controller
{
    public function index(Request $request)
    {
        $bills = Bill::orderBy('BillId', 'desc')->get();
        $header = "";

        $selected = [
            "year" => $request->Year,
            "month" => $request->Month,
            "day" => $request->Day,
            "sortByDate" => $request->SortDateTime,
            "status" => $request->StatusFilter,
        ];
        if ($selected['year'] && $selected['month'] && $selected['day']) {
            $header = "NGÀY " . $selected['day'] . "/" . $selected['month'] . "/" . $selected['year'];
        }
        if ($selected['year'] && $selected['month'] && $selected['day'] == "") {
            $header = "THÁNG " . $selected['month'] . "/" . $selected['year'];
        }
        if ($selected['year'] && $selected['month'] == "" && $selected['day'] == "") {
            $header = "NĂM " . $selected['year'];
        }


        $isFilter = false;
        if ($request->all()) {
            $isFilter = true;
            $bills = Bill::query()
                ->when($request->filled('Year'), function ($query) use ($request) {
                    $query->whereYear('created_at', $request->Year);
                })
                ->when($request->filled('Month'), function ($query) use ($request) {
                    $query->whereMonth('created_at', $request->Month);
                })
                ->when($request->filled('Day'), function ($query) use ($request) {
                    $query->whereDay('created_at', $request->Day);
                })
                ->when($request->filled('StatusFilter'), function ($query) use ($request) {
                    $query->where('Status', $request->StatusFilter);
                })
                ->when($request->filled('SortDateTime'), function ($query) use ($request) {
                    $query->orderBy('BillId', $request->SortDateTime);
                })
                ->get();
        }

        $year = Bill::select(DB::raw('EXTRACT(YEAR FROM created_at) AS bill_year'))->groupBy('bill_year')->get();
        $month = Bill::select(DB::raw('EXTRACT(MONTH FROM created_at) AS bill_month'))->groupBy('bill_month')->get();
        $day = Bill::select(DB::raw('EXTRACT(DAY FROM created_at) AS bill_day'))->groupBy('bill_day')->get();
        $status = ["Pending", "Approve", "Reject", "Shipping", "Done", "Cancel"];
        return view('admin.bills.index', [
            'data' => $bills,
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'isFilter' => $isFilter,
            'selected' => $selected,
            'header' => $header,
            'status' => $status
        ]);
    }
    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        $customer = Customer::findOrFail($bill->CustomerId);
        $bill_details = DB::table('bill_details')
            ->join('products', 'products.ProductId', '=', 'bill_details.ProductId')
            ->where('BillId', $bill->BillId)
            ->get();
        $bill_status = ['Pending', 'Approve', 'Reject'];

        return view('admin.bills.show', [
            'bill' => $bill,
            'customer' => $customer,
            'details' => $bill_details,
            'status' => $bill_status
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        DB::table('bills')->where('BillId', $request->BillId)->update(['Status' => $request->Status,]);
        return redirect()->back()->with('update-success', 'Cập nhật trạng thái thành công');
    }
}
