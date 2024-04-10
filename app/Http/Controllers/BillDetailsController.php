<?php

namespace App\Http\Controllers;

use App\Models\BillDetails;
use App\Http\Requests\StoreBillDetailsRequest;
use App\Http\Requests\UpdateBillDetailsRequest;

class BillDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillDetails  $billDetails
     * @return \Illuminate\Http\Response
     */
    public function show(BillDetails $billDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillDetails  $billDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BillDetails $billDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillDetailsRequest  $request
     * @param  \App\Models\BillDetails  $billDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillDetailsRequest $request, BillDetails $billDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillDetails  $billDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillDetails $billDetails)
    {
        //
    }
}
