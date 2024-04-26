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
        $productTypes = ProductType::all();
        $productModels = ProductModel::orderBy('ProductTypeId', 'asc')->get();
        return view('admin.product_models.index', [
            'types' => $productTypes,
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
        //
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

        return redirect()->route('product_models.index')->with('success', 'Thêm thành công');
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
    public function edit($id)
    {
        $productModel = ProductModel::find($id);
        $productTypes = ProductType::all();
        return view('admin.product_models.edit', [
            'model' => $productModel,
            'types' => $productTypes,
        ])->with('title', $productModel->ProductModelName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductModelRequest  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductModelRequest $request, $id)
    {
        $productModel = ProductModel::findOrFail($id);
        $request->validated();
        $productModel->fill($request->all());
        $productModel->save();

        return redirect()->route('product_models.index')->with('success', 'Cập nhật thành công');
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
        return redirect()->route('product_models.index')->with('success', 'Xóa thành công');
    }
    
}
