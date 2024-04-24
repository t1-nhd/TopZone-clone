<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('ProductName')->distinct()->get();
        return view('admin.product_images.index', ['data' => $products]);
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
     * @param  \App\Http\Requests\StoreProductImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductImageRequest $request)
    {
        $request->validate([
            'ProductImage.*' => 'required|mimes:jpeg,png,webp,jpg'
        ],[
            'ProductImage.mimes' => "Sử dụng những file có đuôi .jpeg, .png, .webp, .jpg"
        ]);
        $productName = $request->ProductName;

        $index = ProductImage::where('ProductName', $productName)->count();

        $path = public_path('images\\Details\\' . $productName);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path);
        }
        if($request->hasFile('ProductImage')){
            $images = $request->file('ProductImage');
            foreach ($images as $image) {
                $newImage = new ProductImage();
                $imageName = str_replace(' ', '-', strtolower($productName)) . "-" . $index++ . "." . $image->extension();
                $image->move($path, $imageName);

                $newImage->ProductImage = $imageName;
                $newImage->ProductName = $productName;

                $newImage->save();
            }
            return redirect()->route('product_images.edit', $productName)->with('success', 'Thêm ảnh thành công');
        }
        return redirect()->route('product_images.edit', $productName)->with('fail', 'Thêm không ảnh thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show($productName)
    {
        $gallary = ProductImage::where('ProductName', $productName)->get();
        return view('admin.product_images.show', ['gallary' => $gallary])->with('title', $productName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit($productName)
    {
        $productImages = ProductImage::where('ProductName', $productName)->get('ProductImage');
        $gallary = ProductImage::where('ProductName', $productName)->get();
        return view('admin.product_images.edit', [
            'productName' => $productName, 
            'productImages' => $productImages
        ])->with('title', $productName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductImageRequest  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        //
    }

    public function delete($productName)
    {
        $productImages = ProductImage::where('ProductName', $productName)->get();
        return view('admin.product_images.delete', [
            'productName' => $productName, 
            'productImages' => $productImages
        ])->with('title', $productName);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ProductImage::find($id);
        $file = public_path('images\\Details\\' . $image->ProductName . '\\'. $image->ProductImage);
        File::delete($file);
        ProductImage::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
