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
        $products = Product::query();
        $data = $products->paginate(10);
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
        $productModels = ProductModel::all();
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
        $newProduct = $request->validate([
            'ProductModelId' => 'required',

            'ProductName' => 'required',
            'UnitPrice' => 'numeric'
        ]);
        if ($request->hasFile('ProductThumbnail')) {
            $image = $request->file('ProductThumbnail');
            $imageName = str_replace(' ', '-', strtolower($request->ProductName)) . '.' .$image->getClientOriginalExtension();
            $newProduct['ProductThumbnail'] = $imageName;
        }

        $result = Product::create($newProduct);

        if($result) return redirect()->route('products.index')->with("Thêm sản phẩm thành công!");
        else return redirect()->route('products.index')->with("Thêm sản phẩm không thành công!");
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
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', ['product' => $product]);
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
    public function destroy($id)
    {
        ProductModel::findOrFail($id)->delete();
        return redirect()->route('product_models.index');
    }
}
