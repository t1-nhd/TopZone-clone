<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use App\Models\ProductType;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data = Product::all();
        return view('admin.products.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        $productTypes = ProductType::all();
        return view('admin.products.create',[
            'models' => $productModels,
            'types' => $productTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(StoreProductRequest $request)
    {
        $newProductModelId = ProductModel::where('ProductModelName', $request->ProductModelName)->first()->ProductModelId;
        $newProduct['ProductModelId'] = $newProductModelId;
        $newProduct['ProductName'] = $request->ProductName;
        $newProduct['Ram'] = $request->Ram;
        $newProduct['Memory'] = $request->Memory;
        if($request->ProductThumbnail) $newProduct['ProductThumbnail'] = $request->ProductThumbnail;
        $newProduct['DesignSizeAndWeight'] = $request->DesignSizeAndWeight;
        $newProduct['UnitPrice'] = $request->UnitPrice;
        $newProduct['Warrenty'] = $request->Warrenty;
        $newProduct['Inventory'] = $request->Inventory;
        $newProduct['isNew'] = $request->isNew;

        $result = Product::create($newProduct);

        if($result) return redirect()->route('products.index')->with("thanh-cong", "Thêm sản phẩm thành công!");
        else return redirect()->route('products.create')->with("that-bai", "Thêm sản phẩm không thành công!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::find($id);
        return view('admin.products.show', ['product' => $product])->with('title', $product->ProductName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ramList = ['4 GB', '6 GB','8 GB','16 GB','18 GB','36 GB'];
        $memoryList = ['64 GB', '128 GB','256 GB','512 GB','1 TB'];
        $warrantyList = ['3 tháng', '6 tháng', '12 tháng', '24 tháng'];
        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        $product = Product::find($id);
        return view('admin.products.edit', [
            'product' => $product, 'models' => $productModels,
            'ramList' => $ramList,
            'memoryList' => $memoryList,
            'warrantyList' => $warrantyList
        ])->with('title', $product->ProductName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete', ['product' => $product]);
    }

    public function destroy($id)
    {
        $result = Product::query()->where('ProductId', $id)->delete();
        if($result) return redirect()->route('products.index')->with('thanh-cong', 'Xóa thành công');
        return redirect()->route('products.index')->with('that-bai', 'Xóa không thành công');
        
    }
}
