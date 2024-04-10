<?php

namespace App\Http\Controllers;

use App\Models\StaffPosition;
use App\Http\Requests\StoreStaffPositionRequest;
use App\Http\Requests\UpdateStaffPositionRequest;

class StaffPositionController extends Controller
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
     * @param  \App\Http\Requests\StoreStaffPositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffPositionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffPosition  $staffPosition
     * @return \Illuminate\Http\Response
     */
    public function show(StaffPosition $staffPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffPosition  $staffPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffPosition $staffPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffPositionRequest  $request
     * @param  \App\Models\StaffPosition  $staffPosition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffPositionRequest $request, StaffPosition $staffPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffPosition  $staffPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffPosition $staffPosition)
    {
        //
    }
}
