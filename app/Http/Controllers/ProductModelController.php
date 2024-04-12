<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Http\Requests\StoreProductModelRequest;
use App\Http\Requests\UpdateProductModelRequest;
use App\Models\ProductType;

class ProductModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productModels = ProductModel::All();
        return view('admin.product_models.index', [
            'data' => $productModels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('admin.product_models.create', ['types' => $productTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductModelRequest $request)
    {
        $newProductModel = new ProductModel();

        $newProductModel->ProductTypeId = $request->ProductTypeId;
        $newProductModel->ProductModelName = $request->ProductModelName;

        $newProductModel->save();

        return redirect()->route('product_models.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductModelRequest  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductModelRequest $request, ProductModel $productModel)
    {
        //
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductModel::find($id)->delete();
        return redirect()->route('product_models.index');
    }
    
}
