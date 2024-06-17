<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductModel;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('ShowOnHomePage', 1)->get();

        return view('welcome', [
            'data' => $products,
        ]);
    }
    public function list($productType)
    {
        $type = ProductType::where('ProductTypeName', $productType)->first();
        $productModels = ProductModel::where('ProductTypeId', $type->ProductTypeId)->get();
        $products = DB::table('products')
            ->join('product_models', 'products.ProductModelId', '=', 'product_models.ProductModelId')
            ->where('products.ShowOnHomePage', 1)
            ->where('product_models.ProductTypeId', $type->ProductTypeId)
            ->get();
        return view('products.index', [
            'data' => $products,
            'models' => $productModels,
            'title' => $productType,
        ]);
    }

    public function filter($productModel)
    {   
        $model = ProductModel::where('ProductModelName', $productModel)->first(['ProductModelId', 'ProductTypeId']);
        $type = ProductType::find($model->ProductTypeId);
        $productModels = ProductModel::where('ProductTypeId', $model->ProductTypeId)->get();
        $products = Product::where('ProductModelId', $model->ProductModelId)->where('ShowOnHomePage', 1)->get();
        return view('products.filter', [
            'type' => $type->ProductTypeName,
            'models' => $productModels,
            'data' => $products,
            'title' => $productModel,
        ]);
    }

    public function show($productName, $memory)
    {
        $product = Product::where('ProductName', $productName)->where('Memory', $memory)->first();
        $memories = Product::where('ProductName', $productName)->get('Memory');
        $images = ProductImage::where('ProductName', $productName)->get('ProductImage');
        $countImage = $images->count();
        return view('products.show',[
            'product' => $product,
            'images' => $images,
            'memories' => $memories,
            'title' => $productName . " " . $memory,
            'count' => $countImage, 
        ]);
    }
}
